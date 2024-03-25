<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
// $router->filter('auth', function(){
//     if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
//         header('location: ' . BASE_URL . 'login');die;
//     }
// });


//bắt đầu định nghĩa ra các đường dẫn
$router->get('/', function(){
    return (new App\Controllers\IndexController())->indexAdmin();
});
//team
$router->get('list-team', [App\Controllers\TeamController::class, 'listTeam']);
$router->get('addTeamView',[App\Controllers\TeamController::class, 'addTeamView']);
$router->post('addT',[App\Controllers\TeamController::class, 'addT']);
$router->get('updateView',[App\Controllers\TeamController::class,'updateView']);
$router->post('updateT',[App\Controllers\TeamController::class, 'updateT']);
$router->get('deleteT',[App\Controllers\TeamController::class, 'deleteT']);
//player
$router->get('list-player', [App\Controllers\PlayerController::class, 'listPlayer']);
$router->get('add-player-view', [App\Controllers\PlayerController::class, 'addView']);
$router->post('add', [App\Controllers\PlayerController::class, 'add']);
$router->get('update-player-view', [App\Controllers\PlayerController::class, 'updateView']);
$router->post('update', [App\Controllers\PlayerController::class, 'update']);
$router->get('delete',[App\Controllers\PlayerController::class, 'delete']);
# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>