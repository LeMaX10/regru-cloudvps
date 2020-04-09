<?php namespace LeMaX10\RegruCloudVPS\Contracts\Entities;


use LeMaX10\RegruCloudVPS\Enums\SizeUnitEnum;

/**
 * Interface SizeEntity
 * @package LeMaX10\RegruCloudVPS\Contracts\Entities
 */
interface SizeEntity
{
    /**
     * Значение
     *
     * @return int
     */
    public function getValue(): int;

    /**
     * Единица
     *
     * @return SizeUnitEnum
     */
    public function getUnit(): SizeUnitEnum;

    /**
     * Человекопонятное выражение
     *
     * @return string
     */
    public function getHumanable(): string;
}
