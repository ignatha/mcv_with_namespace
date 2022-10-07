<?php

Use App\Services\Router;
Use App\Controller\SiswaController;

$router = new Router();

$router->get('/', function(){
    echo 'Home Page';
});

$router->get('/siswa', SiswaController::class . '::execute');
$router->post('/siswa', SiswaController::class . '::postSiswa');
$router->put('/siswa/update', SiswaController::class . '::updateSiswa');
$router->delete('/siswa/delete', SiswaController::class . '::deleteSiswa');

$router->addNotFoundHandler(function(){
    header("Status: 404 Not Found");
    http_response_code(404);
    echo 'Not Found';
});

return $router;