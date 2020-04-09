<?php namespace LeMaX10\RegruCloudVPS\Entities;

use LeMaX10\RegruCloudVPS\Contracts\Entities\TariffPriceEntity as TariffPriceEntityContract;

/**
 * Class TariffPriceEntity
 * @package LeMaX10\RegruCloudVPS\Entities
 */
class TariffPriceEntity extends Entity implements TariffPriceEntityContract
{
    /**
     * @inheritDoc
     */
    public function getHour(): float
    {
        return (float) $this->price;
    }

    /**
     * @inheritDoc
     */
    public function getMonth(): float
    {
        return (float) $this->price_month;
    }
}
