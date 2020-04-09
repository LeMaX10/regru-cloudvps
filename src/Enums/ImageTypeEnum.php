<?php namespace LeMaX10\RegruCloudVPS\Enums;


use MyCLabs\Enum\Enum;

/**
 * Class ImageTypeEnum
 * @package LeMaX10\RegruCloudVPS\Enums
 *
 * @method static ImageTypeEnum DISTRIBUTION()
 * @method static ImageTypeEnum APPLICATION()
 * @method static ImageTypeEnum BACKUP()
 * @method static ImageTypeEnum SNAPSHOT()
 */
final class ImageTypeEnum extends Enum
{
    /**
     * Приложение
     */
    private const APPLICATION  = 'application';
    /**
     * Бэкап
     */
    private const BACKUP       = 'backup';
    /**
     * Шаблон чистой ОС
     */
    private const DISTRIBUTION = 'distribution';
    /**
     * Снэпшот
     */
    private const SNAPSHOT     = 'snapshot';
}
