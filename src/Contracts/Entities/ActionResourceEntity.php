<?php namespace LeMaX10\RegruCloudVPS\Contracts\Entities;


/**
 * Interface ActionResourceEntity
 * @package LeMaX10\RegruCloudVPS\Contracts\Entities
 */
interface ActionResourceEntity
{
    /**
     * Уникальный идентификатор ресурса
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Тип ресурса (сервер, снэпшот и проч.)
     *
     * @return string
     */
    public function getType(): string;
}
