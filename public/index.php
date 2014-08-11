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

$fisica = new \OOP\Cliente\Types\Fisica();
$juridica = new OOP\Cliente\Types\Juridica();
$objClientes = new \OOP\Cliente\ArrayCliente($fisica, $juridica);
$clientes = $objClientes->getClientes(__DIR__ . '/../fisica.txt', __DIR__ . '/../juridica.txt');

if(file_exists(__DIR__ . '/../views/' . $route . '.phtml')) {
    require_once __DIR__ . '/../views/' . $route . '.phtml';
} else {
    http_response_code(404);
    echo 'Página não encontrada';
}

require_once __DIR__ . '/../layout/footer.php';