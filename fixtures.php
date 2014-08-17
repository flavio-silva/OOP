<?php
$config = parse_ini_file(__DIR__ . '/db.ini');
$pdo = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['username'], $config['passwd']);

set_include_path(get_include_path() . PATH_SEPARATOR . 'src/');
spl_autoload_register();

$structure = new OOP\Db\Fixtures\DataStructure($pdo);

$structure->dropTableFisica();
$structure->createTableFisica();
$structure->dropTableJuridica();
$structure->createTableJuridica();

$persistencia = new \OOP\Db\Fixtures\Persistencia($pdo);

$data = include 'fisica.php';

foreach ($data as $cliente)
{
    $persistencia->persist(new OOP\Cliente\Types\Fisica($cliente));
}

$data = include 'juridica.php';

foreach ($data as $cliente)
{
    $persistencia->persist(new OOP\Cliente\Types\Juridica($cliente));
}

$persistencia->flush();