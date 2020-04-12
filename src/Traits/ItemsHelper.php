<?php namespace LeMaX10\RegruCloudVPS\Traits;


use LeMaX10\RegruCloudVPS\Entities\Entity;

/**
 * Trait ItemsHelper
 * @package LeMaX10\RegruCloudVPS\Traits
 */
trait ItemsHelper
{
    /**
     * @param array $items
     * @param \Closure $callback
     * @return array
     */
    public function transform(array $items, \Closure $callback): array
    {
        if (empty($items)) {
            return $items;
        }

        return \array_map($callback, $items);
    }

    /**
     * @param array $items
     * @param \Closure $callback
     * @return array
     */
    public function filter(array $items, \Closure $callback): array
    {
        return \array_filter($items, $callback);
    }

    /**
     * @param array $items
     * @param Closure|null $callback
     * @return mixed|null
     */
    public function first(array $items, ?\Closure $callback = null)
    {
        $item = null;
        if (null === $callback) {
            return \array_shift($items);
        }

        foreach($items as $entity) {
            if ($callback($entity)) {
                $item = $entity;
                break;
            }
        }

        return $item;
    }
}
