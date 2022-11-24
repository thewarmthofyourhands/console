<?php

declare(strict_types=1);

namespace Eva\Console\Events;

use Eva\Console\ArgvInput;

class TerminateEvent
{
    public function __construct(protected ArgvInput $argvInput) {}

    public function getArgvInput(): ArgvInput
    {
        return $this->argvInput;
    }

    public function setArgvInput(ArgvInput $argvInput): void
    {
        $this->argvInput = $argvInput;
    }
}
