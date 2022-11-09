<?php

declare(strict_types=1);


namespace App\Factories;


use Psr\Container\ContainerInterface;

class DbFactory
{
    public function __invoke(ContainerInterface $container): \PDO
    {
        $dsn = $container->get('settings')['db']['host'];
        $name = $container->get('settings')['db']['name'];
        $user = $container->get('settings')['db']['user'];
        $pass = $container->get('settings')['db']['password'];
        return new \PDO($dsn . $name, $user, $pass);
    }
}