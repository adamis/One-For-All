<?php
/**
 * Empacota os geradores em build/OneForAll.php
 * Uso: C:\xampp\php\php.exe Package.php
 */

$buildDir = __DIR__ . DIRECTORY_SEPARATOR . 'build';
$dest     = $buildDir . DIRECTORY_SEPARATOR . 'OneForAll.php';

if (!is_dir($buildDir)) {
    mkdir($buildDir, 0777, true);
}

$version = bumpOneForAllVersion(__DIR__);

$preferred = [
    'ActiveDefine.php',
    'Utils.php',
    'SqlStruct.php',
    'CreateSecurity.php',
    'CreateDaos.php',
    'CreateAdapters.php',
    'CreateInteractor.php',
    'Recursos.php',
    'CreateBarramento.php',
    'CallsActivated.php',
    'Calls.php',
];

$skip = [
    'Package.php',
    'Activated.php',
];

$phpFiles = [];
foreach (scandir(__DIR__) as $entry) {
    if ($entry === '.' || $entry === '..' || $entry[0] === '.' || $entry[0] === '_') {
        continue;
    }
    $path = __DIR__ . DIRECTORY_SEPARATOR . $entry;
    if (!is_file($path) || strtolower(pathinfo($entry, PATHINFO_EXTENSION)) !== 'php') {
        continue;
    }
    if (in_array($entry, $skip, true)) {
        continue;
    }
    $phpFiles[] = $entry;
}

$ordered = [];
foreach ($preferred as $name) {
    if (in_array($name, $phpFiles, true)) {
        $ordered[] = $name;
    }
}
foreach ($phpFiles as $name) {
    if (!in_array($name, $ordered, true)) {
        $ordered[] = $name;
    }
}

$buffer = "<?php\n";
foreach ($ordered as $entry) {
    $conteudo = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . $entry);
    if ($conteudo === false) {
        fwrite(STDERR, "Falha ao ler {$entry}\n");
        exit(1);
    }
    $buffer .= "\n//----------------------- {$entry} -----------------------\n";
    $buffer .= stripPhpWrapper($conteudo);
}

if (file_put_contents($dest, $buffer) === false) {
    fwrite(STDERR, "Falha ao gravar {$dest}\n");
    exit(1);
}

$bytes = filesize($dest);
echo "OneForAll empacotado em {$dest} ({$bytes} bytes)\n";
echo "Versao: {$version}\n";
echo "Arquivos: " . implode(', ', $ordered) . "\n";

function stripPhpWrapper($conteudo)
{
    $conteudo = preg_replace('/^\xEF\xBB\xBF/', '', $conteudo);
    $conteudo = preg_replace('/^\s*<\?php\s*/i', '', $conteudo);
    $conteudo = preg_replace('/\s*\?>\s*$/', '', $conteudo);
    return rtrim($conteudo) . "\n";
}

function bumpOneForAllVersion($root)
{
    $versionFile = $root . DIRECTORY_SEPARATOR . 'VERSION';
    $defineFile  = $root . DIRECTORY_SEPARATOR . 'ActiveDefine.php';
    $current     = '2.0.0';

    if (is_file($versionFile)) {
        $current = trim((string) file_get_contents($versionFile));
    } elseif (is_file($defineFile)) {
        $src = (string) file_get_contents($defineFile);
        if (preg_match('/ONEFORALL_VERSION"\s*,\s*"([^"]+)"/', $src, $m)) {
            $current = $m[1];
        }
    }

    if (!preg_match('/^(\d+)\.(\d+)\.(\d+)/', $current, $m)) {
        $m = [null, '2', '0', '0'];
    }
    $next = $m[1] . '.' . $m[2] . '.' . ((int) $m[3] + 1);

    if (file_put_contents($versionFile, $next . PHP_EOL) === false) {
        fwrite(STDERR, "Falha ao gravar VERSION\n");
        exit(1);
    }

    if (is_file($defineFile)) {
        $src = (string) file_get_contents($defineFile);
        $updated = preg_replace(
            '/define\s*\(\s*"ONEFORALL_VERSION"\s*,\s*"[^"]*"\s*\)/',
            'define ( "ONEFORALL_VERSION", "' . $next . '" )',
            $src,
            1,
            $count
        );
        if ($count === 0) {
            fwrite(STDERR, "ONEFORALL_VERSION nao encontrado em ActiveDefine.php\n");
            exit(1);
        }
        if (file_put_contents($defineFile, $updated) === false) {
            fwrite(STDERR, "Falha ao atualizar ActiveDefine.php\n");
            exit(1);
        }
    }

    $index = $root . DIRECTORY_SEPARATOR . 'build' . DIRECTORY_SEPARATOR . 'index.php';
    if (is_file($index)) {
        $html = (string) file_get_contents($index);
        $html = preg_replace('/OneForAll v\d+\.\d+\.\d+/', 'OneForAll v' . $next, $html);
        file_put_contents($index, $html);
    }

    return $next;
}
