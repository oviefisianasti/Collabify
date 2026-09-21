<?php

require __DIR__ . '/vendor/autoload.php';

$app = require rtrim(realpath(__DIR__) ?: __DIR__, DIRECTORY_SEPARATOR) . '/app/Config/Paths.php';

echo "Project: " . __DIR__ . PHP_EOL;
echo "Database: " . __DIR__ . "/writable/database_final.db" . PHP_EOL;

$db = new SQLite3(__DIR__ . '/writable/database_final.db');

echo "SQLite direct: OK" . PHP_EOL;

