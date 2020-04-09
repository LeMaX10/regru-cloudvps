<?php namespace LeMaX10\RegruCloudVPS\Contracts\Repositories;

use LeMaX10\RegruCloudVPS\Contracts\Entities\SshKeyEntity;
use LeMaX10\RegruCloudVPS\Contracts\Entities\TariffEntity;

/**
 * Interface SshKeysRepository
 * @package LeMaX10\RegruCloudVPS\Contracts\Repositories
 */
interface SshKeyRepository
{
    /**
     * Получить список ключей
     *
     * @return array
     */
    public function getAll(): array;

    /**
     * Вернуть ключ по id
     *
     * @param int $id
     * @return SshKeyEntity|null
     */
    public function getById(int $id): ?SshKeyEntity;

    /**
     * Сохранить ключ
     *
     * @param SshKeyEntity $keyEntity
     * @return SshKeyEntity
     */
    public function save(SshKeyEntity $keyEntity): SshKeyEntity;

    /**
     * Удалить ключ
     *
     * @param SshKeyEntity $keyEntity
     * @return bool
     */
    public function delete(SshKeyEntity $keyEntity): bool;
}
