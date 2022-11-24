<?php

declare(strict_types=1);

namespace Eva\Console;

class ArgvInput
{
    protected string $filename;
    protected string $commandName;
    protected array $options = [];
    protected array $flags = [];

    public function __construct()
    {
        $this->parseArgv($_SERVER['argv']);
    }

    public function parseArgv(array $args): void
    {
        $this->filename = current($args);
        $this->commandName = next($args) ?: '';

        while ($arg = next($args)) {
            if ($arg[0] === '-' && $arg[1] === '-') {
                $option = str_replace('--', '', $arg);
                [$name, $value] = explode('=', $option);

                if (true === isset($this->options[$name])) {
                    if (is_string($this->options[$name])) {
                        $this->options[$name] = [$this->options[$name]];
                    }

                    $this->options[$name][] = $value;
                } else {
                    $this->options[$name] = $value;
                }
            } else if ($arg[0] === '-') {
                for ($i = 1, $iMax = strlen($arg); $i < $iMax; $i++) {
                    $this->flags[] = $arg[$i];
                }
            }
        }
    }

    public function getFlags(): array
    {
        return $this->flags;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function getCommandName(): string
    {
        return $this->commandName;
    }
}
