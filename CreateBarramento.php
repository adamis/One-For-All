<?php
//-----------------------BARRAMENTO SWAGGER-UI--------------------------------------

function mysqlTypeToOpenApi($type)
{
    $t = strtolower((string) $type);
    if (preg_match('/int/', $t)) {
        return 'integer';
    }
    if (preg_match('/decimal|float|double|numeric/', $t)) {
        return 'number';
    }
    return 'string';
}

function buildBarramentoCatalog()
{
    $catalog = [];

    if (function_exists('isSecurityEnabled') && isSecurityEnabled()) {
        $catalog['oauth'] = [
            'description' => 'Autenticação OAuth2',
            'fields' => [
                ['name' => 'grant_type', 'type' => 'string', 'description' => 'password ou refresh_token'],
                ['name' => 'username', 'type' => 'string', 'description' => 'Usuário'],
                ['name' => 'password', 'type' => 'string', 'description' => 'Senha'],
                ['name' => 'client_id', 'type' => 'string', 'description' => 'Padrão: ofa-public'],
                ['name' => 'refresh_token', 'type' => 'string', 'description' => 'Obrigatório no grant refresh_token'],
            ],
            'operations' => [
                ['method' => 'POST', 'operation' => 'token', 'summary' => 'Obter access_token'],
            ],
        ];
    }

    if (!function_exists('getAllTables')) {
        return $catalog;
    }

    try {
        $tables = getAllTables();
        while ($table = $tables->fetch()) {
            if (function_exists('shouldGenerateCrud') && !shouldGenerateCrud($table[0])) {
                continue;
            }
            $name = strtolower((string) $table[0]);
            $fields = [];
            $cols = getColum($table[0]);
            while ($row = $cols->fetch()) {
                $field = [
                    'name' => strtolower((string) $row['Field']),
                    'type' => mysqlTypeToOpenApi($row['Type']),
                ];
                if (function_exists('isDateColumn') && isDateColumn($row['Type'])) {
                    $field['format'] = 'date-time';
                    $field['description'] = 'UTC no formato 31-12-2013T20:11:48Z';
                }
                $fields[] = $field;
            }
            $catalog[$name] = [
                'description' => 'CRUD da tabela ' . $table[0],
                'fields' => $fields,
                'operations' => [
                    ['method' => 'POST', 'operation' => 'find', 'summary' => 'Buscar com filtros'],
                    ['method' => 'GET', 'operation' => 'findAll', 'summary' => 'Listar'],
                    ['method' => 'DELETE', 'operation' => 'remove', 'summary' => 'Remover'],
                    ['method' => 'PUT', 'operation' => 'update', 'summary' => 'Atualizar'],
                    ['method' => 'POST', 'operation' => 'create', 'summary' => 'Criar'],
                ],
            ];
        }
    } catch (Throwable $e) {
        error_log('OneForAll catalog: ' . $e->getMessage());
    }

    return $catalog;
}

function getBarramento()
{
    $catalog = buildBarramentoCatalog();
    $security = function_exists('isSecurityEnabled') && isSecurityEnabled();
    $version = defined('ONEFORALL_VERSION') ? ONEFORALL_VERSION : '2.0.0';

    $openapi = "<?php\n";
    $openapi .= "\$catalog = " . var_export($catalog, true) . ";\n";
    $openapi .= "\$securityEnabled = " . ($security ? 'true' : 'false') . ";\n";
    $openapi .= "\$ofaVersion = " . var_export($version, true) . ";\n";
    $openapi .= <<<'PHP'

header('Content-Type: application/json; charset=UTF-8');
header('Cache-Control: no-store');
header('Access-Control-Allow-Origin: *');

$https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || ((int) ($_SERVER['SERVER_PORT'] ?? 0) === 443)
    || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');
$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
$scriptDir = rtrim($scriptDir, '/');
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$serverUrl = ($https ? 'https://' : 'http://') . $host . $scriptDir . '/api';

if (is_file(__DIR__ . '/Autoload.php')) {
    include_once __DIR__ . '/Autoload.php';
}
if (class_exists('engine\\Acl')) {
    $acl = (new \engine\Acl())->getAcls();
    foreach ($acl as $row) {
        $method = $row[0];
        $operation = $row[1];
        $resource = $row[2];
        if (!isset($catalog[$resource])) {
            $catalog[$resource] = [
                'description' => $resource,
                'fields' => [],
                'operations' => [],
            ];
        }
        $exists = false;
        foreach ($catalog[$resource]['operations'] as $op) {
            if (strcasecmp($op['method'], $method) === 0 && strcasecmp($op['operation'], $operation) === 0) {
                $exists = true;
                break;
            }
        }
        if (!$exists) {
            $catalog[$resource]['operations'][] = [
                'method' => $method,
                'operation' => $operation,
                'summary' => $method . ' ' . $operation,
            ];
        }
    }
}

if (class_exists('engine\\SecurityConfig') && \engine\SecurityConfig::enabled()) {
    $securityEnabled = true;
}

if (class_exists('engine\\Hosts')) {
    try {
        $hosts = new \engine\Hosts();
        $dsn = 'mysql:dbname=' . $hosts->getBanco() . ';host=' . $hosts->getIp() . ';charset=utf8mb4';
        $pdo = new PDO($dsn, $hosts->getUsuario(), $hosts->getSenha(), [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
        foreach ($catalog as $resource => &$meta) {
            if ($resource === 'oauth' || !empty($meta['fields'])) {
                continue;
            }
            if (!preg_match('/^[A-Za-z0-9_]+$/', $resource)) {
                continue;
            }
            $sql = 'SHOW COLUMNS FROM `' . str_replace('`', '', $hosts->getBanco()) . '`.`' . $resource . '`';
            $sth = $pdo->query($sql);
            $fields = [];
            while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                $type = strtolower((string) ($row['Type'] ?? 'string'));
                $field = ['name' => strtolower((string) $row['Field']), 'type' => 'string'];
                if (preg_match('/int/', $type)) {
                    $field['type'] = 'integer';
                } elseif (preg_match('/decimal|float|double|numeric/', $type)) {
                    $field['type'] = 'number';
                }
                $base = preg_replace('/\(.*$/', '', $type);
                if (in_array($base, ['date', 'datetime', 'timestamp', 'time'], true)) {
                    $field['format'] = 'date-time';
                    $field['description'] = 'UTC no formato 31-12-2013T20:11:48Z';
                }
                $fields[] = $field;
            }
            $meta['fields'] = $fields;
        }
        unset($meta);
    } catch (Throwable $e) {
        error_log('OneForAll openapi columns: ' . $e->getMessage());
    }
}

function ofaFieldSchema(array $field)
{
    $schema = ['type' => $field['type']];
    if (!empty($field['format'])) {
        $schema['format'] = $field['format'];
    }
    if (!empty($field['description'])) {
        $schema['description'] = $field['description'];
    }
    return $schema;
}

function ofaFieldParameters(array $fields, $location, $includePaging)
{
    $params = [];
    foreach ($fields as $field) {
        $param = [
            'name' => $field['name'],
            'in' => $location,
            'required' => false,
            'schema' => ofaFieldSchema($field),
        ];
        if (!empty($field['description'])) {
            $param['description'] = $field['description'];
        }
        $params[] = $param;
    }
    if ($includePaging) {
        $params[] = [
            'name' => 'page',
            'in' => $location,
            'required' => false,
            'schema' => ['type' => 'integer', 'minimum' => 0],
            'description' => 'Página (1 em diante)',
        ];
        $params[] = [
            'name' => 'pageSize',
            'in' => $location,
            'required' => false,
            'schema' => ['type' => 'integer', 'minimum' => 0],
            'description' => 'Quantidade por página',
        ];
    }
    return $params;
}

function ofaFormBody(array $fields)
{
    $properties = [];
    foreach ($fields as $field) {
        $properties[$field['name']] = ofaFieldSchema($field);
    }
    return [
        'required' => true,
        'content' => [
            'application/x-www-form-urlencoded' => [
                'schema' => [
                    'type' => 'object',
                    'properties' => $properties,
                ],
            ],
            'application/json' => [
                'schema' => [
                    'type' => 'object',
                    'properties' => $properties,
                ],
            ],
        ],
    ];
}

        $commonHeaders = [
            [
                'name' => 'Accept',
                'in' => 'header',
                'required' => false,
                'schema' => ['type' => 'string', 'default' => 'application/json'],
            ],
            [
                'name' => 'X-Timezone',
                'in' => 'header',
                'required' => false,
                'schema' => ['type' => 'string', 'default' => 'America/Sao_Paulo'],
                'description' => 'Fuso informado pelo cliente (ex.: America/Sao_Paulo)',
            ],
        ];
        $headerParams = $commonHeaders;

$spec = [
    'openapi' => '3.0.3',
    'info' => [
        'title' => 'OneForAll API',
        'description' => 'Barramento gerado automaticamente. Datas em UTC no formato 31-12-2013T20:11:48Z. Use Authorize ou o header Authorization.',
        'version' => $ofaVersion,
    ],
    'servers' => [
        ['url' => $serverUrl, 'description' => 'API gerada'],
    ],
    'tags' => [],
    'paths' => [],
    'components' => [
        'securitySchemes' => new stdClass(),
    ],
];

if ($securityEnabled) {
    $spec['components']['securitySchemes'] = [
        'bearerAuth' => [
            'type' => 'http',
            'scheme' => 'bearer',
            'bearerFormat' => 'opaque',
            'description' => 'Cole o access_token obtido em POST /oauth/token',
        ],
        'oauth2Password' => [
            'type' => 'oauth2',
            'description' => 'Login com username e senha. Client ID: ofa-public. O access_token é aplicado em todas as APIs.',
            'flows' => [
                'password' => [
                    'tokenUrl' => $serverUrl . '/oauth/token',
                    'scopes' => [
                        'access' => 'Acesso às APIs protegidas',
                    ],
                ],
            ],
        ],
    ];
}

foreach ($catalog as $resource => $meta) {
    $spec['tags'][] = [
        'name' => $resource,
        'description' => $meta['description'] ?? $resource,
    ];
    $fields = $meta['fields'] ?? [];
    foreach ($meta['operations'] as $op) {
        $method = strtolower($op['method']);
        $operation = $op['operation'];
        $path = '/' . $resource . '/' . $operation;
        $isOauth = ($resource === 'oauth' && $operation === 'token');
        $usesBody = in_array($method, ['post', 'put', 'patch'], true);
        $includePaging = in_array($operation, ['find', 'findAll'], true);

        $operationSpec = [
            'tags' => [$resource],
            'summary' => $op['summary'] ?? ($op['method'] . ' ' . $operation),
            'operationId' => $resource . '_' . $operation . '_' . $method,
            'parameters' => $isOauth ? $commonHeaders : $headerParams,
        ];

        if ($isOauth) {
            $operationSpec['security'] = [];
            $operationSpec['requestBody'] = ofaFormBody($fields);
            $operationSpec['description'] = 'Rota pública. Não envie Authorization. Use grant_type=password, username, password e client_id=ofa-public.';
        } elseif ($method === 'get' || $method === 'delete') {
            $operationSpec['parameters'] = array_merge(
                $headerParams,
                ofaFieldParameters($fields, 'query', $includePaging)
            );
        } elseif ($operation === 'find') {
            $operationSpec['requestBody'] = ofaFormBody(array_merge($fields, [
                ['name' => 'page', 'type' => 'integer', 'description' => 'Página'],
                ['name' => 'pageSize', 'type' => 'integer', 'description' => 'Tamanho da página'],
            ]));
            $operationSpec['requestBody']['required'] = false;
        } elseif ($method === 'put') {
            $operationSpec['parameters'] = array_merge($headerParams, [[
                'name' => 'id',
                'in' => 'query',
                'required' => true,
                'schema' => ['type' => 'integer'],
                'description' => 'Chave primária (deve coincidir com o id do body)',
            ]]);
            $operationSpec['requestBody'] = ofaFormBody($fields);
        } elseif ($usesBody) {
            $operationSpec['requestBody'] = ofaFormBody($fields);
        }

        if ($securityEnabled && !$isOauth) {
            $operationSpec['security'] = [
                ['oauth2Password' => ['access']],
                ['bearerAuth' => []],
            ];
        }

        $operationSpec['responses'] = [
            '200' => [
                'description' => 'Sucesso',
                'content' => [
                    'application/json' => [
                        'schema' => ['type' => 'object'],
                    ],
                ],
            ],
            '400' => ['description' => 'Requisição inválida'],
        ];
        if (!$isOauth) {
            $operationSpec['responses']['401'] = ['description' => 'Token ausente ou inválido'];
        }

        if (!isset($spec['paths'][$path])) {
            $spec['paths'][$path] = [];
        }
        $spec['paths'][$path][$method] = $operationSpec;
    }
}

echo json_encode($spec, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
PHP;

    gravar('openapi.php', $openapi);

    $html = <<<HTML
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OneForAll — Barramento</title>
    <link rel="stylesheet" href="https://unpkg.com/swagger-ui-dist@5.17.14/swagger-ui.css">
    <style>
        html { box-sizing: border-box; overflow-y: scroll; }
        *, *:before, *:after { box-sizing: inherit; }
        body { margin: 0; background: #fafafa; font-family: sans-serif; }
        .ofa-top {
            background: #1b1b1b;
            color: #fff;
            padding: 16px 24px 12px;
        }
        .ofa-top h1 { margin: 0 0 4px; font-size: 22px; font-weight: 600; }
        .ofa-top p { margin: 0; color: #bbb; font-size: 13px; }
        .ofa-headers {
            background: #2d2d2d;
            color: #eee;
            padding: 12px 24px 16px;
        }
        .ofa-headers h2 { margin: 0 0 8px; font-size: 14px; font-weight: 600; letter-spacing: .04em; text-transform: uppercase; }
        .ofa-headers p { margin: 0 0 10px; font-size: 12px; color: #bbb; }
        .ofa-h-row { display: flex; gap: 8px; margin-bottom: 6px; align-items: center; }
        .ofa-h-row input {
            border: 1px solid #555;
            background: #1b1b1b;
            color: #fff;
            padding: 6px 8px;
            border-radius: 4px;
            font-size: 13px;
        }
        .ofa-h-row input.name { width: 220px; }
        .ofa-h-row input.value { flex: 1; }
        .ofa-h-row button, .ofa-headers .ofa-add {
            border: 0;
            border-radius: 4px;
            padding: 6px 10px;
            cursor: pointer;
            font-size: 12px;
        }
        .ofa-h-row button { background: #5d2a2a; color: #fff; }
        .ofa-add { background: #89bf04; color: #1b1b1b; font-weight: 700; }
        .swagger-ui .topbar { display: none; }
    </style>
</head>
<body>
    <div class="ofa-top">
        <h1>OneForAll Barramento</h1>
        <p>Console no estilo Swagger UI. Use <strong>Authorize</strong> para o Bearer ou os headers abaixo. Datas: <code>31-12-2013T20:11:48Z</code></p>
    </div>
    <div class="ofa-headers">
        <h2>Headers da requisição</h2>
        <p>O token do <strong>Authorize</strong> (oauth2Password) é aplicado em todas as APIs. Headers extras também são enviados; o Bearer do login prevalece.</p>
        <div id="ofaHeaderRows"></div>
        <button type="button" class="ofa-add" id="ofaAddHeader">Adicionar header</button>
    </div>
    <div id="swagger-ui"></div>
    <script src="https://unpkg.com/swagger-ui-dist@5.17.14/swagger-ui-bundle.js" crossorigin></script>
    <script src="https://unpkg.com/swagger-ui-dist@5.17.14/swagger-ui-standalone-preset.js" crossorigin></script>
    <script>
        const STORAGE_KEY = 'ofa.swagger.headers';

        function defaultHeaders() {
            return [
                { name: 'Authorization', value: '' },
                { name: 'Accept', value: 'application/json' },
                { name: 'Content-Type', value: 'application/x-www-form-urlencoded; charset=UTF-8' },
                { name: 'X-Timezone', value: 'America/Sao_Paulo' }
            ];
        }

        function loadHeaders() {
            try {
                const raw = localStorage.getItem(STORAGE_KEY);
                if (raw) {
                    const parsed = JSON.parse(raw);
                    if (Array.isArray(parsed) && parsed.length) {
                        return parsed;
                    }
                }
            } catch (e) {}
            return defaultHeaders();
        }

        function saveHeaders() {
            const rows = [];
            document.querySelectorAll('#ofaHeaderRows .ofa-h-row').forEach(function (row) {
                rows.push({
                    name: row.querySelector('.name').value,
                    value: row.querySelector('.value').value
                });
            });
            localStorage.setItem(STORAGE_KEY, JSON.stringify(rows));
        }

        function addHeaderRow(name, value) {
            const wrap = document.getElementById('ofaHeaderRows');
            const row = document.createElement('div');
            row.className = 'ofa-h-row';
            row.innerHTML =
                '<input class="name" placeholder="Header" value="">' +
                '<input class="value" placeholder="Valor" value="">' +
                '<button type="button" class="ofa-del">Remover</button>';
            row.querySelector('.name').value = name || '';
            row.querySelector('.value').value = value || '';
            row.querySelector('.ofa-del').addEventListener('click', function () {
                row.remove();
                saveHeaders();
            });
            row.querySelector('.name').addEventListener('input', saveHeaders);
            row.querySelector('.value').addEventListener('input', saveHeaders);
            wrap.appendChild(row);
        }

        document.getElementById('ofaAddHeader').addEventListener('click', function () {
            addHeaderRow('', '');
            saveHeaders();
        });

        loadHeaders().forEach(function (item) {
            addHeaderRow(item.name, item.value);
        });

        function isBlankValue(v) {
            return v == null || (typeof v === 'string' && v.trim() === '');
        }

        function isPlaceholderAuth(value) {
            return /Bearer\s+eyJhbGciOi/i.test(String(value || ''));
        }

        function stripEmptyFromRequest(req) {
            try {
                var u = new URL(req.url, window.location.href);
                Array.from(u.searchParams.keys()).forEach(function (k) {
                    var vals = u.searchParams.getAll(k);
                    u.searchParams.delete(k);
                    vals.forEach(function (v) {
                        if (!isBlankValue(v)) {
                            u.searchParams.append(k, v);
                        }
                    });
                });
                req.url = u.toString();
            } catch (e) {}

            if (typeof req.body === 'string' && req.body.indexOf('=') !== -1) {
                try {
                    var params = new URLSearchParams(req.body);
                    var next = new URLSearchParams();
                    params.forEach(function (v, k) {
                        if (!isBlankValue(v)) {
                            next.append(k, v);
                        }
                    });
                    req.body = next.toString();
                } catch (e) {}
            } else if (req.body && typeof req.body === 'object' && !Array.isArray(req.body)) {
                Object.keys(req.body).forEach(function (k) {
                    if (isBlankValue(req.body[k])) {
                        delete req.body[k];
                    }
                });
            }
        }

        if (typeof SwaggerUIBundle === 'undefined') {
            document.getElementById('swagger-ui').innerHTML =
                '<p style="padding:24px;color:#b71c1c;">Não foi possível carregar o Swagger UI (CDN). Verifique a conexão e recarregue a página.</p>';
        } else {
            var presets = [SwaggerUIBundle.presets.apis];
            var layout = 'BaseLayout';
            if (typeof SwaggerUIStandalonePreset !== 'undefined') {
                presets.push(SwaggerUIStandalonePreset);
                layout = 'StandaloneLayout';
            }
            window.ui = SwaggerUIBundle({
            url: 'openapi.php',
            dom_id: '#swagger-ui',
            presets: presets,
            layout: layout,
            deepLinking: true,
            persistAuthorization: true,
            tryItOutEnabled: true,
            filter: true,
            displayRequestDuration: true,
            oauth2RedirectUrl: window.location.origin + window.location.pathname.replace(/[^/]+$/, '') + 'oauth2-redirect.html',
            requestInterceptor: function (req) {
                var method = String(req.method || 'GET').toUpperCase();
                var isTokenUrl = /\/oauth\/token(\?|$)/i.test(req.url || '');
                if (!req.headers) {
                    req.headers = {};
                }
                document.querySelectorAll('#ofaHeaderRows .ofa-h-row').forEach(function (row) {
                    var name = (row.querySelector('.name').value || '').trim();
                    var value = (row.querySelector('.value').value || '').trim();
                    if (!name || !value) {
                        return;
                    }
                    var lower = name.toLowerCase();
                    if (isTokenUrl && (lower === 'authorization' || lower === 'content-type')) {
                        return;
                    }
                    if ((method === 'GET' || method === 'DELETE' || method === 'HEAD') && lower === 'content-type') {
                        return;
                    }
                    if (lower === 'authorization' && isPlaceholderAuth(value)) {
                        return;
                    }
                    req.headers[name] = value;
                });
                if (method === 'GET' || method === 'DELETE' || method === 'HEAD') {
                    delete req.headers['Content-Type'];
                    delete req.headers['content-type'];
                }
                if (isTokenUrl) {
                    delete req.headers.Authorization;
                    delete req.headers.authorization;
                    stripEmptyFromRequest(req);
                    return req;
                }
                var currentAuth = req.headers.Authorization || req.headers.authorization || '';
                if (isPlaceholderAuth(currentAuth)) {
                    delete req.headers.Authorization;
                    delete req.headers.authorization;
                }
                var access = getAuthorizedAccessToken();
                if (access) {
                    req.headers.Authorization = 'Bearer ' + access;
                    syncBearerHeader(access);
                }
                stripEmptyFromRequest(req);
                return req;
            },
            responseInterceptor: function (res) {
                try {
                    var url = res.url || '';
                    var body = res.body || res.data || null;
                    if (typeof body === 'string') {
                        try { body = JSON.parse(body); } catch (e) { body = null; }
                    }
                    if (/\/oauth\/token/i.test(url) && res.status >= 200 && res.status < 300 && body && body.access_token) {
                        syncBearerHeader(body.access_token);
                    }
                } catch (e) {}
                return res;
            }
        });

            if (window.ui && typeof window.ui.initOAuth === 'function') {
                window.ui.initOAuth({
                    clientId: 'ofa-public',
                    clientSecret: '',
                    realm: 'OneForAll',
                    appName: 'OneForAll',
                    scopes: 'access',
                    additionalQueryStringParams: {},
                    usePkceWithAuthorizationCodeGrant: false
                });
            }
        }

        function getAuthorizedAccessToken() {
            try {
                if (!window.ui || !window.ui.authSelectors) {
                    return '';
                }
                var authorized = window.ui.authSelectors.authorized();
                if (!authorized) {
                    return '';
                }
                var js = typeof authorized.toJS === 'function' ? authorized.toJS() : authorized;
                if (js.oauth2Password) {
                    var oauth = js.oauth2Password;
                    var token = oauth.token || oauth.value || oauth;
                    if (token && token.access_token) {
                        return String(token.access_token);
                    }
                }
                if (js.bearerAuth) {
                    var bearer = js.bearerAuth.value || js.bearerAuth;
                    if (typeof bearer === 'string' && bearer !== '') {
                        return bearer.replace(/^Bearer\s+/i, '');
                    }
                    if (bearer && bearer.access_token) {
                        return String(bearer.access_token);
                    }
                }
            } catch (e) {}
            return '';
        }

        function syncBearerHeader(access) {
            if (!access) {
                return;
            }
            var bearer = 'Bearer ' + access;
            var rows = document.querySelectorAll('#ofaHeaderRows .ofa-h-row');
            var found = false;
            rows.forEach(function (row) {
                var name = (row.querySelector('.name').value || '').trim().toLowerCase();
                if (name === 'authorization') {
                    row.querySelector('.value').value = bearer;
                    found = true;
                }
            });
            if (!found) {
                addHeaderRow('Authorization', bearer);
            }
            saveHeaders();
        }
    </script>
</body>
</html>
HTML;

    gravar('barramento.php', $html);
}

//-----------------------BARRAMENTO SWAGGER-UI--------------------------------------
?>
