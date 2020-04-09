<?php namespace LeMaX10\RegruCloudVPS\Contracts\Repositories;

use LeMaX10\RegruCloudVPS\Contracts\Entities\TariffEntity;

/**
 * Interface TariffRepository
 * @package LeMaX10\RegruCloudVPS\Contracts\Repositories
 */
interface TariffRepository
{
    /**
     * Получить список тарифов
     *
     * @return array
     */
    public function getAll(): array;

    /**
     * Вернуть тариф равный id
     *
     * @param int $id
     * @return TariffEntity|null
     */
    public function getById(int $id): ?TariffEntity;

    /**
     * Вернуть тариф равный slug
     *
     * @param string $slug
     * @return TariffEntity|null
     */
    public function getBySlug(string $slug): ?TariffEntity;
}
