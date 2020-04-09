<?php namespace LeMaX10\RegruCloudVPS\Entities;

use Carbon\Carbon;
use LeMaX10\RegruCloudVPS\Contracts\Entities\ActionEntity as ActionEntityContract;
use LeMaX10\RegruCloudVPS\Contracts\Entities\ActionResourceEntity as ActionResourceEntityContract;
use LeMaX10\RegruCloudVPS\Enums\ActionStatusEnum;

class ActionEntity extends Entity implements ActionEntityContract
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
    public function getType(): string
    {
        return (string) $this->type;
    }

    /**
     * @inheritDoc
     */
    public function getStatus(): ActionStatusEnum
    {
        return new ActionStatusEnum($this->status);
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
    public function getResource(): ActionResourceEntityContract
    {
        return new ActionResourceEntity($this->getRaw());
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
    public function getStartedAt(): ?Carbon
    {
        if (empty($this->started_at)) {
            return null;
        }

        return new Carbon($this->started_at);
    }

    /**
     * @inheritDoc
     */
    public function getCompletedAt(): ?Carbon
    {
        if (empty($this->started_at)) {
            return null;
        }

        return new Carbon($this->completed_at);
    }
}
