<?php

declare(strict_types=1);

namespace Eva\Console\EventListeners;

use Eva\Console\Events\ExceptionEvent;

class ExceptionListener
{
    public function __invoke(ExceptionEvent $exceptionEvent): void
    {
        $throwable = $exceptionEvent->getThrowable();
        $message = sprintf(
            'error code: %s, message: %s, file: %s, line: %s, trace: %s' . PHP_EOL,
            $throwable->getCode(),
            $throwable->getMessage(),
            $throwable->getFile(),
            $throwable->getLine(),
            $throwable->getTraceAsString(),
        );
        echo $message;
    }
}
