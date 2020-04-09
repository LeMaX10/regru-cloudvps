<?php namespace LeMaX10\RegruCloudVPS\Contracts\Entities;


/**
 * Interface TariffPriceEntity
 * @package LeMaX10\RegruCloudVPS\Contracts\Entities
 */
interface TariffPriceEntity
{
    /**
     * Цена в час, руб.
     *
     * @return float
     */
    public function getHour(): float;

    /**
     * Цена в месяц, руб.
     *
     * @return string
     */
    public function getMonth(): float;
}
