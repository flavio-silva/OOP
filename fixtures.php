<?php
$config = parse_ini_file(__DIR__ . '/db.ini');
$pdo = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['username'], $config['passwd']);

set_include_path(get_include_path() . PATH_SEPARATOR . '../src/');
spl_autoload_register();

$structure = new OOP\Db\Fixtures\DataStructure($pdo);

$structure->dropTableFisica();
$structure->createTableFisica();
$structure->dropTableJuridica();
$structure->createTableJuridica();