<?php namespace LeMaX10\RegruCloudVPS\Entities;

use Carbon\Carbon;
use LeMaX10\RegruCloudVPS\Contracts\Entities\ImageEntity as ImageEntityContract;
use LeMaX10\RegruCloudVPS\Contracts\Entities\ServerEntity as ServerEntityContract;
use LeMaX10\RegruCloudVPS\Contracts\Entities\ServerIpEntity as ServerIpEntityContract;
use LeMaX10\RegruCloudVPS\Contracts\Entities\TariffEntity as TariffEntityContract;
use LeMaX10\RegruCloudVPS\Contracts\Entities\SizeEntity as SizeEntityContract;
use LeMaX10\RegruCloudVPS\Enums\ServerStatusEnum;
use LeMaX10\RegruCloudVPS\Enums\SizeUnitEnum;

/**
 * Class ServerEntity
 * @package LeMaX10\RegruCloudVPS\Entities
 */
class ServerEntity extends Entity implements ServerEntityContract
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
    public function getHostname(): string
    {
        return (string) $this->hostname;
    }

    /**
     * @inheritDoc
     */
    public function getIp(): ServerIpEntityContract
    {
        return new ServerIpEntity([
            'ipv4' => $this->ip,
            'ipv6' => $this->ipv6
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getCpus(): int
    {
        return (int) $this->vcpus;
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
    public function getPtr(): string
    {
        return (string) $this->ptr;
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
    public function getImage(): ImageEntityContract
    {
        return new ImageEntity($this->image);
    }

    /**
     * @inheritDoc
     */
    public function getSize(): TariffEntityContract
    {
        return new TariffEntity($this->size);
    }

    /**
     * @inheritDoc
     */
    public function getStatus(): ServerStatusEnum
    {
        return new ServerStatusEnum($this->status);
    }

    /**
     * @inheritDoc
     */
    public function getSubStatus(): ?string
    {
        if (empty($this->sub_status)) {
            return null;
        }

        return (string) $this->sub_status;
    }

    /**
     * @inheritDoc
     */
    public function getServiceId(): ?int
    {
        return $this->service_id;
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt(): Carbon
    {
        return new Carbon($this->created_at);
    }

    /**
     * @inheritDoc
     */
    public function getArchivedAt(): ?Carbon
    {
        if (empty($this->archived_at)) {
            return null;
        }

        return new Carbon($this->archived_at);
    }

    /**
     * @inheritDoc
     */
    public function getIsLocked(): bool
    {
        return (bool) ($this->locked === 1);
    }

    /**
     * @inheritDoc
     */
    public function getIsBackup(): bool
    {
        return (bool) ($this->backups_enabled === 1);
    }
}
