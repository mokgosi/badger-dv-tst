<?php

declare(strict_types=1);

namespace Framework\Database;

use Framework\Database\Adapter\PdoAdapter;

class DatabaseManager {

    public $adapter;
    public $driver;
    public $options;

	public function __construct() 
	{
        $options = ['host' => '127.0.0.1', 'port' => 3306, 'dbname' => 'badgersdvtst', 'username' => 'root', 'password' => ''];
        $this->adapter = new PdoAdapter('mysql', $options);
	}

    public function fetchAll(string $query, array $params = []): array
    {
        return $this->adapter->fetchAll($query, $params);
    }

    public function execute(string $query, array $params = []): int
    {
        return $this->adapter->execute($query, $params);
    }

    public function fetchOne(string $query, array $params = []): array
    {
        return $this->adapter->fetchOne($query, $params);
    }
}