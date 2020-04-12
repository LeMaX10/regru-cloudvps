<?php namespace LeMaX10\RegruCloudVPS\Contracts\Actions;


use LeMaX10\RegruCloudVPS\Contracts\Entities\ActionEntity;
use LeMaX10\RegruCloudVPS\Contracts\Entities\ImageEntity;
use LeMaX10\RegruCloudVPS\Contracts\Entities\ServerEntity;
use LeMaX10\RegruCloudVPS\Contracts\Entities\TariffEntity;
use LeMaX10\RegruCloudVPS\Contracts\Responses\ServerCreateResponse;
use LeMaX10\RegruCloudVPS\Enums\PowerEnum;

/**
 * Interface ServerAction
 * @package LeMaX10\RegruCloudVPS\Contracts\Actions
 */
interface ServerAction
{
    /**
     * Создание сервера
     *
     * @param TariffEntity $tariffEntity
     * @param ImageEntity $imageEntity
     * @param string|null $name
     * @param array|null $sshKeys
     * @param bool $backup
     * @return ServerCreateResponse
     */
    public function create(TariffEntity $tariffEntity, ImageEntity $imageEntity, ?string $name = null, ?array $sshKeys = [], bool $backup = false): ServerCreateResponse;

    /**
     * Рестарт сервера
     *
     * @param ServerEntity $serverEntity
     * @return ActionEntity
     */
    public function reboot(ServerEntity $serverEntity): ActionEntity;

    /**
     * Переименовать сервер
     *
     * @param ServerEntity $serverEntity
     * @param string $name
     * @return ServerEntity
     */
    public function rename(ServerEntity $serverEntity, string $name): ServerEntity;

    /**
     * Изменить тариф сервера
     *
     * @param ServerEntity $serverEntity
     * @param TariffEntity $tariffEntity
     * @return ActionEntity
     */
    public function changeTariff(ServerEntity $serverEntity, TariffEntity $tariffEntity): ActionEntity;

    /**
     * Сбросить пароль
     *
     * @param ServerEntity $serverEntity
     * @return ActionEntity
     */
    public function resetPassword(ServerEntity $serverEntity): ActionEntity;

    /**
     * Переустановить систему на сервере
     *
     * @param ServerEntity $serverEntity
     * @param ImageEntity $imageEntity
     * @return ActionEntity
     */
    public function rebuild(ServerEntity $serverEntity, ImageEntity $imageEntity): ActionEntity;

    /**
     * Включить/Выключить сервер
     *
     * @param ServerEntity $serverEntity
     * @param PowerEnum $powerEnum
     * @return ActionEntity
     */
    public function power(ServerEntity $serverEntity, PowerEnum $powerEnum): ActionEntity;

    /**
     * Включить/Выключить услугу бекапа
     *
     * @param ServerEntity $serverEntity
     * @param bool $state
     * @return ActionEntity
     */
    public function backup(ServerEntity $serverEntity, bool $state): ActionEntity;

    /**
     * Восстановить сервер из бекапа
     *
     * @param ServerEntity $serverEntity
     * @param ImageEntity $imageEntity
     * @return ActionEntity
     */
    public function restore(ServerEntity $serverEntity, ImageEntity $imageEntity): ActionEntity;
}
