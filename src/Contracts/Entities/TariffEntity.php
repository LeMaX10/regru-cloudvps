<?php namespace LeMaX10\RegruCloudVPS\Contracts\Entities;


/**
 * Interface TariffEntity
 * @package LeMaX10\RegruCloudVPS\Contracts\Entities
 */
interface TariffEntity
{
    /**
     * Уникальный идентификатор тарифа
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Имя тарифа
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Уникальный читаемый идентификатор тарифа
     *
     * @return string
     */
    public function getSlug(): string;

    /**
     * Цена тарифа
     *
     * @return TariffPriceEntity
     */
    public function getPrice(): TariffPriceEntity;

    /**
     * Флаг для архивных тарифов
     *
     * @return bool
     */
    public function getIsArchived(): bool;

    /**
     * Объём оперативной памяти в МБ
     *
     * @return SizeEntity
     */
    public function getMemory(): SizeEntity;

    /**
     * Количество процессорных ядер
     *
     * @return int
     */
    public function getCpu(): int;

    /**
     * Сортировка
     *
     * @return int
     */
    public function getWeight(): int;

    /**
     * Объём диска в ГБ
     *
     * @return SizeEntity
     */
    public function getDisk(): SizeEntity;
}
