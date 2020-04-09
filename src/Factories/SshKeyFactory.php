<?php namespace LeMaX10\RegruCloudVPS\Factories;


use LeMaX10\RegruCloudVPS\Entities\Entity;
use LeMaX10\RegruCloudVPS\Entities\SshKeyEntity;

/**
 * Class SshKeyFactory
 * @package LeMaX10\RegruCloudVPS\Factories
 */
class SshKeyFactory extends EntityFactory
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $publicKey;

    /**
     * SshKeyFactory constructor.
     * @param string $name
     * @param string $publicKey
     */
    public function __construct(string $name, string $publicKey)
    {
        $this->name = $name;
        $this->publicKey = $publicKey;
    }

    /**
     * @inheritDoc
     */
    public function createEntity(): Entity
    {
        return new SshKeyEntity([
            'name'       => $this->name,
            'public_key' => $this->publicKey
        ]);
    }
}
