<?php namespace LeMaX10\RegruCloudVPS\Contracts\Responses;


use LeMaX10\RegruCloudVPS\Contracts\Entities\ServerEntity;

/**
 * Interface ServerCreateResponse
 * @package LeMaX10\RegruCloudVPS\Contracts\Responses
 */
interface ServerCreateResponse
{
    /**
     * Получить действия связанные с сервером
     *
     * @return array
     */
    public function getActions(): array;

    /**
     * Получить созданный сервер
     *
     * @return ServerEntity
     */
    public function getServer(): ServerEntity;
}
