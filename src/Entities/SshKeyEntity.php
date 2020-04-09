<?php namespace LeMaX10\RegruCloudVPS\Entities;

use LeMaX10\RegruCloudVPS\Contracts\Entities\SshKeyEntity as SshKeyEntityContract;

/**
 * Class SshKeyEntity
 * @package LeMaX10\RegruCloudVPS\Entities
 */
class SshKeyEntity extends Entity implements SshKeyEntityContract
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
    public function getFingerprint(): string
    {
        return (string) $this->fingerprint;
    }

    /**
     * @inheritDoc
     */
    public function getPublicKey(): string
    {
        return (string) $this->public_key;
    }

    /**
     * @inheritDoc
     */
    public function setName(string $name): SshKeyEntityContract
    {
        $this->entity['name'] = $name;

        return $this;
    }
}
