<?php namespace LeMaX10\RegruCloudVPS\Contracts\Repositories;

use LeMaX10\RegruCloudVPS\Contracts\Entities\ServerEntity;

/**
 * Interface ServerRepository
 * @package LeMaX10\RegruCloudVPS\Contracts\Repositories
 */
interface ServerRepository
{
    /**
     * Получить список Серверов
     *
     * @return array
     */
    public function getAll(): array;

    /**
     * Получить все сервера с фильтрацией по статусам
     *
     * @param array $status
     * @return array
     */
    public function getAllByStatus(array $status): array;

    /**
     * Получить сервер по ID
     *
     * @param int $id
     * @return ServerEntity|null
     */
    public function getById(int $id): ?ServerEntity;

    /**
     * Удаление сервера
     *
     * @param ServerEntity $serverEntity
     * @return bool
     */
    public function delete(ServerEntity $serverEntity): bool;
}
