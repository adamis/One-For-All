<?php
//-----------------------UTILS--------------------------------------

function gravar($arquivo, $texto, $replace = null)
{
    if ($replace === null) {
        $replace = !defined('FORCE_OVERWRITE') || FORCE_OVERWRITE;
    }

    if (!$replace && file_exists($arquivo)) {
        return false;
    }

    $dir = dirname($arquivo);
    if ($dir !== '.' && $dir !== '' && !is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    return file_put_contents($arquivo, $texto) !== false;
}

function ler($arquivo)
{
    return file_get_contents($arquivo);
}

//-----------------------UTILS--------------------------------------
