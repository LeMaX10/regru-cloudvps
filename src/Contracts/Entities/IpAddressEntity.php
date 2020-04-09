<?php


namespace LeMaX10\RegruCloudVPS\Contracts\Entities;


use Carbon\Carbon;
use LeMaX10\RegruCloudVPS\Enums\IpTypeEnum;

/**
 * Interface IpAddressEntity
 * @package LeMaX10\RegruCloudVPS\Contracts\Entities
 */
interface IpAddressEntity
{
    /**
     * Уникальный идентификатор IP-адреса
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Сам IP-адрес
     *
     * @return string
     */
    public function getIp(): string;

    /**
     * DNS-запись типа PTR для IP-адреса
     *
     * @return string
     */
    public function getPtr(): string;

    /**
     * id реглета к которому привязан IP
     *
     * @return string
     */
    public function getRegletId(): string;

    /**
     * Текущий статус IP-адреса,
     *
     * @return string
     */
    public function getStatus(): string;

    /**
     * Тип IP-адреса
     *
     * @return IpTypeEnum
     */
    public function getType(): IpTypeEnum;

    /**
     * Уникальное читаемое имя региона
     *
     * @return string
     */
    public function getRegionSlug(): string;

    /**
     * Дата и время подключения IP-адреса
     *
     * @return Carbon
     */
    public function getCreatedAt(): Carbon;
}
