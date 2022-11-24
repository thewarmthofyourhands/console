<?php

declare(strict_types=1);

namespace Eva\Console;

use Eva\Console\Events\ExceptionEvent;
use Eva\Console\Events\InputEvent;
use Eva\Console\Events\OutputEvent;
use Eva\Console\Events\TerminateEvent;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Throwable;

class Kernel implements KernelInterface
{
    public function __construct(
        protected readonly RouterInterface $router,
        protected readonly ContainerInterface $container,
    ) {}

    /**
     * @throws Throwable
     */
    public function handle(ArgvInput $argvInput): void
    {
        try {
            $this->container->get('eventDispatcher')->dispatch(new InputEvent($argvInput));
            $commandClass = $this->router->findRoute($argvInput->getCommandName());
            $command = $this->container->get($commandClass);
            $command->execute($argvInput);
            $this->container->get('eventDispatcher')->dispatch(new OutputEvent());
        } catch (Throwable $e) {
            $this->container->get('eventDispatcher')->dispatch(new ExceptionEvent($argvInput, $e));
        }
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function terminate(ArgvInput $argvInput): void
    {
        $event = new TerminateEvent($argvInput);
        $this->container->get('eventDispatcher')->dispatch($event);
    }
}
