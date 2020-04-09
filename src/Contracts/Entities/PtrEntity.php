<?php namespace LeMaX10\RegruCloudVPS\Contracts\Entities;


/**
 * Interface PtrEntity
 * @package LeMaX10\RegruCloudVPS\Contracts\Entities
 */
interface PtrEntity
{
    /**
     * Домен, который нужно прописать в качестве PTR
     *
     * @return string
     */
    public function getPtr(): string;
}
