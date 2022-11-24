<?php

declare(strict_types=1);

namespace Eva\Console;

interface KernelInterface
{
    public function handle(ArgvInput $argvInput): void;
    public function terminate(ArgvInput $argvInput): void;
}
