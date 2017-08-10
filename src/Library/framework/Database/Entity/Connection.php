<?php

declare(strict_types=1);

namespace Framework\Database\Entity;

use Framework\Database\Adapter\AdapterInterface;

class Connection
{
    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * @var string
     */
    protected $driver;

    /**
     * @var array
     */
    protected $options;

    public function getAdapter(): AdapterInterface
    {
        return $this->adapter;
    }

    public function setAdapter(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getDriver(): string
    {
        return $this->driver;
    }

    public function setDriver(string $driver)
    {
        $this->driver = $driver;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function setOptions(array $options)
    {
        $this->options = $options;
    }
}
