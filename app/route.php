<?php

Use App\Services\Router;
Use App\Services\SiswaServices;

$router = new Router();

$router->get('/', function(){
    echo 'Home Page';
});

$router->get('/siswa', SiswaServices::class . '::execute');
$router->post('/siswa', SiswaServices::class . '::postSiswa');
$router->post('/siswa/update', SiswaServices::class . '::updateSiswa');

$router->addNotFoundHandler(function(){
    header("Status: 404 Not Found");
    http_response_code(404);
    echo 'Not Found';
});

return $router;