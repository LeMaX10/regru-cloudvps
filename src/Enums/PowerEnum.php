<?php namespace LeMaX10\RegruCloudVPS\Enums;


use MyCLabs\Enum\Enum;

/**
 * Class PowerEnum
 * @package LeMaX10\RegruCloudVPS\Enums
 *
 * @method static PowerEnum START()
 * @method static PowerEnum STOP()
 */
final class PowerEnum extends Enum
{
    /**
     * Запустить сервер
     */
    private const START = 'start';
    /**
     * Остановить сервер
     */
    private const STOP  = 'stop';
}
