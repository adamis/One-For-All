# OneForAll

Gerador PHP de APIs REST a partir de um banco **MySQL**.

O OneForAll lê as tabelas do schema, gera um backend CRUD (DAO + Adapter + Interactor + rotas) e publica as rotas em `/api/{tabela}/{metodo}`. Opcionalmente protege tudo com **OAuth2** (Bearer token).

Repositório: [adamis/One-For-All](https://github.com/adamis/One-For-All)

Versão atual: ver o arquivo [`VERSION`](VERSION).

## O que ele gera

A partir de cada tabela do MySQL (exceto as internas `ofa_*`):

| Camada | Pasta | Função |
|--------|--------|--------|
| DAO | `build/engine/dao/` | Entidade + getters/setters + JSON |
| Adapter | `build/engine/adapter/` | Liga a entidade à conexão |
| Interactor | `build/engine/interactor/` | `find`, `findAll`, `create`, `update`, `remove` |
| Router | `build/engine/Router.php` | Despacha a URL para o método |
| Barramento | `build/barramento.php` | Tela para listar e testar as APIs |

Métodos gerados por tabela:

| HTTP | Método | Uso |
|------|--------|-----|
| `POST` | `find` | Lista com filtros (`$_REQUEST`) |
| `GET` | `findAll` | Lista com filtros (`$_GET`) |
| `POST` | `create` | Insert |
| `PUT` | `update` | Update (chave `id` na query e no body) |
| `DELETE` | `remove` | Delete |

Exemplo, tabela `chamados`:

```
GET  /OneForAll/build/api/chamados/findAll
POST /OneForAll/build/api/chamados/create
PUT  /OneForAll/build/api/chamados/update?id=1
DELETE /OneForAll/build/api/chamados/remove?id=1
```

## Requisitos

- PHP 8.2+ (XAMPP: `C:\xampp\php\php.exe`)
- Apache com `mod_rewrite`
- MySQL 5.7 / 8
- Extensão PDO MySQL

Coloque o projeto em `htdocs`, por exemplo `C:\xampp\htdocs\OneForAll`.

## 1. Configurar o banco

Edite [`ActiveDefine.php`](ActiveDefine.php):

```php
define("PROJECT", "OneForAll/build"); // caminho web a partir do htdocs
define("BANCO",   "seu_banco");
define("IP",      "localhost");
define("USUARIO", "root");
define("SENHA",   "");                 // não commite senha real

define("MAPPING_DATABASE", "TESTE");   // usa BANCO_T / IP_T / USUARIO_T / SENHA_T
define("TIMEZONE", "America/Sao_Paulo");
define("FORCE_OVERWRITE", true);       // true = regenera engine/ a cada geração
```

`PROJECT` precisa bater com a pasta pública. Se o gerador estiver em `htdocs/OneForAll/build`, mantenha `OneForAll/build`.

Há dois blocos de credenciais: **oficial** (`BANCO`, `IP`, …) e **teste** (`BANCO_T`, …). Com `MAPPING_DATABASE` = `TESTE`, a geração lê o schema de teste.

## 2. Empacotar o gerador

Sempre que alterar os fontes PHP da raiz, empacote de novo:

```bat
C:\xampp\php\php.exe Package.php
```

Isso:

- sobe o patch em `VERSION` e `ONEFORALL_VERSION` (ex.: `2.0.5` → `2.0.6`)
- gera `build/OneForAll.php` (arquivo único que o Apache executa)

Não rode o `Package.php` no GitHub sem revisar: o arquivo empacotado herda o que estiver em `ActiveDefine.php` (incluindo senha).

## 3. Gerar as APIs

1. Suba Apache + MySQL.
2. Abra no navegador:

   `http://localhost/OneForAll/build/`

3. Na primeira visita o OneForAll cria `index.php` e pergunta:

   **Deseja construir as proteções de segurança?**

   - **Sim** — cria tabelas `ofa_users` / tokens OAuth2, usuário `admin` e exige `Authorization: Bearer …` em todas as rotas (exceto obter token).
   - **Não** — APIs abertas.

4. Ao terminar, abre o **Barramento** (`barramento.php`) com a lista de rotas.

Com `FORCE_OVERWRITE = true`, cada geração reescreve `build/engine/`.

## 4. Usar a API

Base (ajuste o host/pasta):

`http://localhost/OneForAll/build/api/{tabela}/{metodo}`

### Sem OAuth2

```http
GET /OneForAll/build/api/chamados/findAll HTTP/1.1
```

Filtros: envie o nome da coluna como parâmetro. Datas devem ir no formato da API (abaixo). Paginação: `page` e `pageSize`.

### Com OAuth2

1. Credenciais iniciais em `build/engine/oauth-admin.txt` (arquivo local, não versionado).
2. Obter token:

```http
POST /OneForAll/build/api/oauth/token
Content-Type: application/x-www-form-urlencoded

grant_type=password&username=admin&password=SENHA&client_id=ofa-public
```

Renovação: `grant_type=refresh_token` + `refresh_token`.

3. Nas demais rotas:

```http
Authorization: Bearer {access_token}
```

Sem token válido a API responde **401**.

## Datas e fuso

Entrada e saída de colunas `date` / `datetime` / `timestamp` / `time` usam **UTC** no formato:

```
31-12-2013T20:11:48Z
```

O valor gravado no MySQL é o horário local de `TIMEZONE` (padrão `America/Sao_Paulo`). Cada JSON inclui o campo `timezone`. A resposta HTTP também envia o header `X-Timezone`.

## Estrutura do repositório

```
OneForAll/
├── ActiveDefine.php      # banco, pasta, timezone, versão
├── Package.php           # empacota tudo em build/OneForAll.php
├── CreateDaos.php
├── CreateAdapters.php
├── CreateInteractor.php
├── CreateSecurity.php    # OAuth2 opcional
├── Recursos.php          # Hosts, Connection, Router, codec de datas
├── Calls.php             # esteira de geração
├── VERSION
└── build/
    ├── OneForAll.php     # gerador empacotado (abra no browser)
    ├── barramento.php    # lista / teste das APIs
    └── engine/           # backend gerado (DAO, adapter, interactor, auth)
```

## Branches (Git Flow)

- `main` — produção
- `develop` — desenvolvimento
- `feature/` — novas funcionalidades (`feature/85500_titulo`)

## Licença / crédito

Adamis © OneForAll.
