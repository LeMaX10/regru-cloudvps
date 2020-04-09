<?php namespace LeMaX10\RegruCloudVPS\Contracts\Responses;


use LeMaX10\RegruCloudVPS\Contracts\Entities\ServerEntity;

/**
 * Interface ServerCreateResponse
 * @package LeMaX10\RegruCloudVPS\Contracts\Responses
 */
interface SnapshotCreateResponse
{
    /**
     * Получить действия связанные с сервером
     *
     * @return array
     */
    public function getActions(): array;

    /**
     * Получить идентификатор сервера
     *
     * @return ServerEntity
     */
    public function getServerId(): int;
}
