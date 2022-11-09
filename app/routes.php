<?php
declare(strict_types=1);

use App\Controllers\AddScoreController;
use App\Controllers\CoursesAPIController;
use App\Controllers\GetScoresController;
use App\Controllers\ResetScoreboardController;
use Slim\App;
use Slim\Views\PhpRenderer;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();

    // enable CORS
    $app->add(function ($request, $handler) {
        $response = $handler->handle($request);
        return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');
    });

    $app->get('/scores', GetScoresController::class);
    $app->post('/scores', AddScoreController::class);
    $app->delete('/scores', ResetScoreboardController::class);

};
