<?php namespace LeMaX10\RegruCloudVPS\Contracts\Entities;


use Carbon\Carbon;
use LeMaX10\RegruCloudVPS\Enums\ImageTypeEnum;

/**
 * Interface ImageEntity
 * @package LeMaX10\RegruCloudVPS\Contracts\Entities
 */
interface ImageEntity
{
    /**
     * Уникальный идентификатор образа
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Имя образа
     * @return string
     */
    public function getName(): string;

    /**
     * Уникальный читаемый идентификатор образа
     * @return string
     */
    public function getSlug(): string;

    /**
     * Тип образа
     *
     * @return ImageTypeEnum
     * @see ImageTypeEnum
     */
    public function getType(): ImageTypeEnum;

    /**
     * Уникальное читаемое имя региона
     *
     * @return string|null
     */
    public function getRegionSlug(): ?string;

    /**
     * Базовый образ - этот параметр определяет как будет производиться настройка
     *
     * @return string
     */
    public function getDistribution(): string;

    /**
     * Минимальный размер диска на который можно развернуть этот образ, ГБ
     *
     * @return SizeEntity
     */
    public function getMinDiskSize(): SizeEntity;

    /**
     * Размер образа, ГБ
     *
     * @return SizeEntity
     */
    public function getSize(): SizeEntity;

    /**
     * Дата создания образа
     *
     * @return Carbon
     */
    public function getCreatedAt(): Carbon;
}
