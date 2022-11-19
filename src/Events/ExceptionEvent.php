<?php

declare(strict_types=1);

namespace Eva\Console\Events;

use Eva\Console\ArgvInput;

class ExceptionEvent
{
    public function __construct(
        protected ArgvInput $argvInput,
        protected \Throwable $throwable,
    ) {}

    public function getArgvInput(): ArgvInput
    {
        return $this->argvInput;
    }

    public function setArgvInput(ArgvInput $argvInput): void
    {
        $this->argvInput = $argvInput;
    }

    public function getThrowable(): \Throwable
    {
        return $this->throwable;
    }

    public function setThrowable(\Throwable $throwable): void
    {
        $this->throwable = $throwable;
    }
}
