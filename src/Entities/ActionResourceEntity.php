<?php namespace LeMaX10\RegruCloudVPS\Entities;

use LeMaX10\RegruCloudVPS\Contracts\Entities\ActionResourceEntity as ActionResourceEntityContract;

class ActionResourceEntity extends Entity implements ActionResourceEntityContract
{
    /**
     * @inheritDoc
     */
    public function getId(): int
    {
        return (int) $this->resource_id;
    }

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return (string) $this->resource_type;
    }
}
