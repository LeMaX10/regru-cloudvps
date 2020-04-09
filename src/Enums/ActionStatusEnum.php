<?php namespace LeMaX10\RegruCloudVPS\Enums;


use MyCLabs\Enum\Enum;

/**
 * Class ActionStatusEnum
 * @package LeMaX10\RegruCloudVPS\Enums
 */
final class ActionStatusEnum extends Enum
{
    /**
     * Поставлено в очередь, но еще не начало исполняться
     */
    private const NEW           = 'new';
    /**
     * В процессе выполнения
     */
    private const IN_PROGRESS   = 'in-progress';
    /**
     * Задание завершено с ошибкой
     */
    private const ERROR         = 'errored';
    /**
     * Задание завершено успешно
     */
    private const COMPLETED     = 'completed';
}
