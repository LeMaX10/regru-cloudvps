<?php namespace LeMaX10\RegruCloudVPS\Contracts\Entities;


use Carbon\Carbon;
use LeMaX10\RegruCloudVPS\Enums\ServerStatusEnum;

/**
 * Interface ServerEntity
 * @package LeMaX10\RegruCloudVPS\Contracts\Entities
 */
interface ServerEntity
{
    /**
     * уникальный идентификатор сервера
     *
     * @return int
     */
    public function getId(): int;

    /**
     * имя сервера
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Хостнейм сервера
     *
     * @return string
     */
    public function getHostname(): string;

    /**
     * IP адреса сервера
     *
     * @return ServerIpEntity
     */
    public function getIp(): ServerIpEntity;

    /**
     * Количество процессорных ядер
     *
     * @return int
     */
    public function getCpus(): int;

    /**
     * Размер диска сервера, ГБ
     *
     * @return SizeEntity
     */
    public function getDisk(): SizeEntity;

    /**
     * Объём памяти на сервере, МБ
     *
     * @return SizeEntity
     */
    public function getMemory(): SizeEntity;

    /**
     * PTR-запись
     *
     * @return string
     */
    public function getPtr(): string;

    /**
     * Уникальное читаемое имя региона
     *
     * @return string
     */
    public function getRegionSlug(): string;

    /**
     * Данные об образе на сервере
     *
     * @return ImageEntity
     */
    public function getImage(): ImageEntity;

    /**
     * Данные о тарифе на сервере
     *
     * @return TariffEntity
     */
    public function getSize(): TariffEntity;

    /**
     * Статус сервера
     * @return ServerStatusEnum
     */
    public function getStatus(): ServerStatusEnum;

    /**
     * Подстатус сервера
     *
     * @return string|null
     */
    public function getSubStatus(): ?string;

    /**
     * Идентификатор услуги «Облачные VPS»
     *
     * @return int|null
     */
    public function getServiceId(): ?int;

    /**
     * Дата создания сервера
     *
     * @return Carbon
     */
    public function getCreatedAt(): Carbon;

    /**
     * Дата удаления сервера
     *
     * @return Carbon|null
     */
    public function getArchivedAt(): ?Carbon;

    /**
     * Заблокирован ли сервер
     *
     * @return bool
     */
    public function getIsLocked(): bool;

    /**
     * Подключено ли бекапирование
     * @return bool
     */
    public function getIsBackup(): bool;
}
