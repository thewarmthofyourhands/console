<?php

declare(strict_types=1);

namespace Eva\Console;

interface RouterInterface
{
    public function findRoute(string $commandName): string;
    public function setRoutes(array $routes): void;
}
