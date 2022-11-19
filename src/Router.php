<?php

declare(strict_types=1);

namespace Eva\Console;

class Router implements RouterInterface
{
    protected array $routes = [];

    public function findRoute(string $commandName): string
    {
        foreach ($this->routes as $routeName => $routeClass) {
            if ($routeName === $commandName) {
                return $routeClass;
            }
        }

        throw new \RuntimeException('Route not found');
    }

    public function setRoutes(array $routes): void
    {
        $this->routes = $routes;
    }
}
