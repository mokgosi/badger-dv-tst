<?php

declare(strict_types=1);

namespace Framework\Database\Adapter;

interface AdapterInterface
{
    public function __construct(string $driver, array $options);

    public function fetchAll(string $query, array $params = []): array;

    public function fetchOne(string $query, array $params = []): array;

    public function execute(string $query, array $params = []): int;

    public function getLastInsertId(string $name = null);

}
