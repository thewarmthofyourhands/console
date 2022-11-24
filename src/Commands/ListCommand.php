<?php

declare(strict_types=1);

namespace Eva\Console\Commands;

class ListCommand
{
    public function __construct(protected array $commands = []) {}

    public function execute(): void
    {
        print "\n[Commands]:\n";
        foreach ($this->commands as $command => $class) {
            printf("%s: %s\n", $command, $class);
        }
        print "\n";
    }
}
