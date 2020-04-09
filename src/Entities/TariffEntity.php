<?php namespace LeMaX10\RegruCloudVPS\Entities;

use LeMaX10\RegruCloudVPS\Contracts\Entities\TariffEntity as TariffEntityContract;
use LeMaX10\RegruCloudVPS\Contracts\Entities\TariffPriceEntity as TariffPriceEntityContract;
use LeMaX10\RegruCloudVPS\Contracts\Entities\SizeEntity as SizeEntityContract;
use LeMaX10\RegruCloudVPS\Enums\SizeUnitEnum;

/**
 * Class TariffEntity
 * @package LeMaX10\RegruCloudVPS\Entities
 */
class TariffEntity extends Entity implements TariffEntityContract
{
    /**
     * @inheritDoc
     */
    public function getId(): int
    {
        return (int) $this->id;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return (string) $this->name;
    }

    /**
     * @inheritDoc
     */
    public function getSlug(): string
    {
        return (string) $this->slug;
    }

    /**
     * @inheritDoc
     */
    public function getPrice(): TariffPriceEntityContract
    {
        return new TariffPriceEntity([
            'price'       => $this->price,
            'price_month' => $this->price_month
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getIsArchived(): bool
    {
        return (bool) ($this->archived) === 1;
    }

    /**
     * @inheritDoc
     */
    public function getMemory(): SizeEntityContract
    {
        return new SizeEntity([
            'value' => $this->memory,
            'unit'  => SizeUnitEnum::MB()
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getCpu(): int
    {
        return (int) $this->vcpus;
    }

    /**
     * @inheritDoc
     */
    public function getWeight(): int
    {
        return (int) $this->weight;
    }

    /**
     * @inheritDoc
     */
    public function getDisk(): SizeEntityContract
    {
        return new SizeEntity([
            'value' => $this->disk,
            'unit'  => SizeUnitEnum::GB()
        ]);
    }
}
