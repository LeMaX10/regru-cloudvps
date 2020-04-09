<?php namespace LeMaX10\RegruCloudVPS\Entities;

use LeMaX10\RegruCloudVPS\Contracts\Entities\SizeEntity as SizeEntityContract;
use LeMaX10\RegruCloudVPS\Enums\SizeUnitEnum;

class SizeEntity extends Entity implements SizeEntityContract
{
    /**
     * @inheritDoc
     */
    public function getValue(): int
    {
        return (int) $this->value;
    }

    /**
     * @inheritDoc
     */
    public function getUnit(): SizeUnitEnum
    {
        return $this->unit;
    }

    /**
     * @inheritDoc
     */
    public function getHumanable(): string
    {
        return $this->getValue() .' '. $this->getUnit()->getValue();
    }
}
