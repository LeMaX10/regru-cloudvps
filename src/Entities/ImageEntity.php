<?php namespace LeMaX10\RegruCloudVPS\Entities;

use Carbon\Carbon;
use LeMaX10\RegruCloudVPS\Contracts\Entities\ImageEntity as ImageEntityContract;
use LeMaX10\RegruCloudVPS\Contracts\Entities\SizeEntity as SizeEntityContract;
use LeMaX10\RegruCloudVPS\Enums\ImageTypeEnum;
use LeMaX10\RegruCloudVPS\Enums\SizeUnitEnum;

/**
 * Class ImageEntity
 * @package LeMaX10\RegruCloudVPS\Entities
 */
class ImageEntity extends Entity implements ImageEntityContract
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
    public function getType(): ImageTypeEnum
    {
        return new ImageTypeEnum($this->type);
    }

    /**
     * @inheritDoc
     */
    public function getRegionSlug(): ?string
    {
        if (!is_string($this->region_slug)) {
             return null;
        }

        return (string) $this->region_slug;
    }

    /**
     * @inheritDoc
     */
    public function getDistribution(): string
    {
        return (string) $this->distribution;
    }

    /**
     * @inheritDoc
     */
    public function getMinDiskSize(): SizeEntityContract
    {
        return new SizeEntity([
            'value' => $this->min_disk_size,
            'unit'  => SizeUnitEnum::GB()
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getSize(): SizeEntityContract
    {
        return new SizeEntity([
            'value' => $this->size_gigabytes,
            'unit'  => SizeUnitEnum::GB()
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt(): Carbon
    {
        return new Carbon($this->created_at);
    }
}
