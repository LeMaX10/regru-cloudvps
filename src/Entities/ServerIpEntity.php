<?php namespace LeMaX10\RegruCloudVPS\Entities;

use LeMaX10\RegruCloudVPS\Contracts\Entities\ServerIpEntity as ServerIpEntityContract;

class ServerIpEntity extends Entity implements ServerIpEntityContract
{
    /**
     * @inheritDoc
     */
    public function getIpv4(): string
    {
        return (string) $this->ipv4;
    }

    /**
     * @inheritDoc
     */
    public function getIpv6(): ?string
    {
        if (empty($this->ipv6)) {
            return null;
        }

        return (string) $this->ipv6;
    }
}
