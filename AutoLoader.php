<?php
function AutoLoader($className) {
    $filePath = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    if (file_exists(__DIR__ . '/' . $filePath . '.php')) {
        include_once __DIR__ . '/' . $filePath . '.php';
    }
}

spl_autoload_register('AutoLoader');