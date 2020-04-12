<?php namespace LeMaX10\RegruCloudVPS\Contracts;


use LeMaX10\RegruCloudVPS\Contracts\Actions\ServerAction as ServerActionContract;
use LeMaX10\RegruCloudVPS\Contracts\Repositories\ImageRepository as ImageRepositoryContract;
use LeMaX10\RegruCloudVPS\Contracts\Repositories\IpRepository as IpRepositoryContract;
use LeMaX10\RegruCloudVPS\Contracts\Repositories\ServerRepository as ServerRepositoryContract;
use LeMaX10\RegruCloudVPS\Contracts\Repositories\SnapshotRepository as SnapshotRepositoryContract;
use LeMaX10\RegruCloudVPS\Contracts\Repositories\SshKeyRepository as SshKeyRepositoryContract;
use LeMaX10\RegruCloudVPS\Contracts\Repositories\TariffRepository as TariffRepositoryContract;

interface CloudVpnClient
{
    /**
     * Образы
     *
     * @return ImageRepositoryContract
     */
    public function images(): ImageRepositoryContract;

    /**
     * IP адреса
     *
     * @return IpRepositoryContract
     */
    public function ips(): IpRepositoryContract;

    /**
     * Сервера
     *
     * @return ServerRepositoryContract
     */
    public function servers(): ServerRepositoryContract;

    /**
     * Снапшот
     *
     * @return SnapshotRepositoryContract
     */
    public function snapshots(): SnapshotRepositoryContract;

    /**
     * SSH Ключи
     *
     * @return SshKeyRepositoryContract
     */
    public function sshkeys(): SshKeyRepositoryContract;

    /**
     * Тарифы
     * @return TariffRepositoryContract
     */
    public function tariffs(): TariffRepositoryContract;

    /**
     * Действия с сервером
     *
     * @return ServerActionContract
     */
    public function serverAction(): ServerActionContract;
}
