<?php
declare(strict_types=1);

use App\Factories\DbFactory;
use App\Factories\LoggerFactory;
use App\Factories\RendererFactory;
use DI\ContainerBuilder;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer;

return function (ContainerBuilder $containerBuilder) {
    $container = [];

    $container[PDO::class] = DI\factory(DbFactory::class);
    $containerBuilder->addDefinitions($container);
};
