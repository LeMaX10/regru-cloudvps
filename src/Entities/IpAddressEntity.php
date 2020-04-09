<?php namespace LeMaX10\RegruCloudVPS\Entities;

use Carbon\Carbon;
use LeMaX10\RegruCloudVPS\Contracts\Entities\IpAddressEntity as IpAddressEntityContract;
use LeMaX10\RegruCloudVPS\Enums\IpTypeEnum;

class IpAddressEntity extends Entity implements IpAddressEntityContract
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
    public function getIp(): string
    {
        return (string) $this->ip;
    }

    /**
     * @inheritDoc
     */
    public function getPtr(): string
    {
        return (string) $this->ptr;
    }

    /**
     * @inheritDoc
     */
    public function getRegletId(): string
    {
        return (string) $this->reglet_id;
    }

    /**
     * @inheritDoc
     */
    public function getStatus(): string
    {
        return (string) $this->status;
    }

    /**
     * @inheritDoc
     */
    public function getType(): IpTypeEnum
    {
        return new IpTypeEnum($this->type);
    }

    /**
     * @inheritDoc
     */
    public function getRegionSlug(): string
    {
        return (string) $this->region_slug;
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt(): Carbon
    {
        return new Carbon($this->created_at);
    }
}
