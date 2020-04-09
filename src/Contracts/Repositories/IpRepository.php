<?php namespace LeMaX10\RegruCloudVPS\Contracts\Repositories;


use LeMaX10\RegruCloudVPS\Contracts\Entities\IpAddressEntity;
use LeMaX10\RegruCloudVPS\Enums\IpTypeEnum;

/**
 * Interface IpRepository
 * @package LeMaX10\RegruCloudVPS\Contracts\Repositories
 */
interface IpRepository
{
    /**
     * Получить список всех ip адресов
     *
     * @return array
     */
    public function getAll(): array;

    /**
     * Получить список только активных IP
     *
     * @return array
     */
    public function getAllActive(): array;

    /**
     * Получить список адресов сервера по id
     *
     * @param int $serverId
     * @return array
     */
    public function getAllByServerId(int $serverId): array;

    /**
     * Получить ip адреса указанного типа
     *
     * @param IpTypeEnum $type
     * @return array
     */
    public function getAllByType(IpTypeEnum $type): array;

    /**
     * Получить выбранный ip адрес
     *
     * @param int $id
     * @return IpAddressEntity|null
     */
    public function getById(int $id): ?IpAddressEntity;

    /**
     * Удаление ip адреса
     *
     * @param IpAddressEntity $ipAddressEntity
     * @return bool
     */
    public function delete(IpAddressEntity $ipAddressEntity): bool;
}
