<?php

require_once __DIR__ . '/../layout/header.php';

$route = array();
preg_match('/[[:alpha:]]+((?=\?))?/', $_SERVER['REQUEST_URI'], $route);
if(empty($route)) {
    $route = 'home';
} else {
    $route = $route[0];
}

if(file_exists(__DIR__ . '/../views/' . $route . '.phtml')) {
    require_once __DIR__ . '/../views/' . $route . '.phtml';
} else {
    http_response_code(404);
    echo 'Página não encontrada';
}

require_once __DIR__ . '/../layout/footer.php';