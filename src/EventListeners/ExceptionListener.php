<?php

declare(strict_types=1);

namespace Eva\Console\EventListeners;

use Eva\Console\Events\ExceptionEvent;

class ExceptionListener
{
    public function __invoke(ExceptionEvent $exceptionEvent): void
    {
        $message = $exceptionEvent->getThrowable()->getMessage();
        $message =  'error: ' . $exceptionEvent->getThrowable()->getTraceAsString() . $message;
        echo $message;
    }
}
