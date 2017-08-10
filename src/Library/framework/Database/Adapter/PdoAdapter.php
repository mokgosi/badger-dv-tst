<?php

declare(strict_types=1);

namespace Framework\Database\Adapter;

use Framework\Database\DatabaseManager;
use Framework\Database\Exception\DatabaseConnectionException;
use Framework\Database\Exception\DatabaseException;
use Framework\Database\Exception\InvalidQueryException;

class PdoAdapter implements AdapterInterface
{
    /**
     * @var \PDO
     */
    protected $pdo;

    /**
     * @var string
     */
    protected $driver;

    public function __construct(string $driver, array $options)
    {
        $this->driver = $driver;
        $this->setPdo($driver, $options);
    }

    /**
     * @throws DatabaseException
     */
    public function fetchAll(string $query, array $params = []): array
    {
        $stmt = $this->executeStatement($query, $params);
        
        try {
            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new DatabaseException($e->getMessage(), $e->getCode(), $e);
        }

        return $rows;
    }

    public function fetchOne(string $query, array $params = []): array
    {
        $stmt = $this->executeStatement($query, $params);
        try {
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new DatabaseException($e->getMessage(), $e->getCode(), $e);
        }

        if ($row === false) {
            $row = [];
        }

        return $row;
    }

    public function execute(string $query, array $params = []): int
    {
        if (empty($params)) {
            try {
                return $this->pdo->exec($query);
            } catch (\PDOException $e) {
                throw new InvalidQueryException($e->getMessage(), 0, $e);
            }
        }

        $stmt = $this->executeStatement($query, $params);

        return $stmt->rowCount();
    }

    /**
     * @throws InvalidQueryException
     */
    protected function executeStatement(string $query, array $params): \PDOStatement
    {
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
        } catch (\PDOException $e) {
            throw new InvalidQueryException($e->getMessage(), 0, $e);
        }

        return $stmt;
    }

    public function getLastInsertId(string $name = null)
    {
        return $this->pdo->lastInsertId($name);
    }

    public function escapeValue(string $value): string
    {
        return str_replace(['\\', "\0", "\n", "\r", "'", '"', "\x1a"], ['\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'], $value);
    }

    protected function setPdo(string $driver, array $options)
    {
        $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s', $options['host'], $options['port'], $options['dbname']);
        
        $mySqlOptions = [
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ];

        $defaultPdoOptions = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        ];

        $mySqlOptions = $defaultPdoOptions + $mySqlOptions;

        if (isset($options['pdo_attributes']) && is_array($options['pdo_attributes'])) {
            $mySqlOptions = $options['pdo_attributes'] + $mySqlOptions;
        }
        
        try {
            if (isset($options['username']) && isset($options['password'])) {
                $this->pdo = new \PDO($dsn, $options['username'], $options['password'], $mySqlOptions);
            } else {
                $this->pdo = new \PDO($dsn, null, null, $mySqlOptions);
            }
        } catch (\PDOException $e) {
            throw new DatabaseConnectionException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
