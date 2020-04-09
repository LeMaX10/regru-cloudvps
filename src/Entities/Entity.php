<?php namespace LeMaX10\RegruCloudVPS\Entities;


/**
 * Class Entity
 * @package LeMaX10\RegruCloudVPS\Entities
 */
abstract class Entity
{
    /**
     * @var array
     */
    protected $entity;

    /**
     * Entity constructor.
     * @param array $entity
     */
    public function __construct(array $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->entity;
    }

    /**
     * @return array
     */
    public function getRaw(): array
    {
        return $this->toArray();
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        return $this->entity[$name] ?? null;
    }
}
