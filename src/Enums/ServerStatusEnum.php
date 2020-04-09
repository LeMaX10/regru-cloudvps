<?php namespace LeMaX10\RegruCloudVPS\Enums;


use MyCLabs\Enum\Enum;

/**
 * Class ServerStatusEnum
 * @package LeMaX10\RegruCloudVPS\Enums
 */
final class ServerStatusEnum extends Enum
{
    /**
     * Сервер уже в базе, но еще не создан
     */
    private const NEW = 'new';
    /**
     * Сервер активен - создан и работает
     */
    private const ACTIVE = 'active';
    /**
     * Сервер выключен (shutdown)
     */
    private const OFF = 'off';
    /**
     * Сервер приостановлен (недостаточно средств)
     */
    private const SUSPENDED = 'suspended';
    /**
     * Архивный (удалён)
     */
    private const ARCHIVE = 'archive';
}
