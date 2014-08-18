<?php

require_once __DIR__ . '/../layout/header.php';

$route = array();
preg_match('/[[:alpha:]]+((?=\?))?/', $_SERVER['REQUEST_URI'], $route);
if(empty($route)) {
    $route = 'home';
} else {
    $route = $route[0];
}

set_include_path(get_include_path() . PATH_SEPARATOR . '../src/');
spl_autoload_register();

$config = parse_ini_file(__DIR__ . '/../db.ini');
$repository = new OOP\Cliente\Types\ClienteRepository(new PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['username'], $config['passwd']));
$fisica = $repository->loadFisica();
$juridica = $repository->loadJuridica();
$clientes = array_merge($fisica, $juridica);
if(file_exists(__DIR__ . '/../views/' . $route . '.phtml')) {
    require_once __DIR__ . '/../views/' . $route . '.phtml';
} else {
    http_response_code(404);
    echo 'Página não encontrada';
}

require_once __DIR__ . '/../layout/footer.php';