<?php namespace LeMaX10\RegruCloudVPS\Factories;


use LeMaX10\RegruCloudVPS\Entities\Entity;

/**
 * Class EntityFactory
 * @package LeMaX10\RegruCloudVPS\Factories
 */
abstract class EntityFactory
{
    /**
     * @return Entity
     */
    abstract public function createEntity(): Entity;
}
