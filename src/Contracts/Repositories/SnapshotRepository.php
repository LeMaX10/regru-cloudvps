<?php namespace LeMaX10\RegruCloudVPS\Contracts\Repositories;

use LeMaX10\RegruCloudVPS\Contracts\Entities\ImageEntity;

/**
 * Interface SnapshotRepository
 * @package LeMaX10\RegruCloudVPS\Contracts\Repositories
 */
interface SnapshotRepository
{
    /**
     * Получить список снапшотов
     *
     * @return array
     */
    public function getAll(): array;

    /**
     * Получить снапшот по id
     *
     * @param int $id
     * @return ImageEntity|null
     */
    public function getById(int $id): ?ImageEntity;

    /**
     * Получить снапшот по slug
     *
     * @param string $slug
     * @return ImageEntity|null
     */
    public function getBySlug(string $slug): ?ImageEntity;

    /**
     * Удаление снапшота
     *
     * @param ImageEntity $imageEntity
     * @return bool
     */
    public function delete(ImageEntity $imageEntity): bool;
}
