<?php namespace LeMaX10\RegruCloudVPS\Enums;


use MyCLabs\Enum\Enum;

/**
 * Class SizeUnitEnum
 * @package LeMaX10\RegruCloudVPS\Enums
 *
 * @method static SizeUnitEnum BYTES()
 * @method static SizeUnitEnum KB()
 * @method static SizeUnitEnum MB()
 * @method static SizeUnitEnum GB()
 * @method static SizeUnitEnum TB()
 */
final class SizeUnitEnum extends Enum
{
    /**
     * Байт
     */
    private const BYTES = 'bytes';
    /**
     * Килобайт
     */
    private const KB    = 'kb';
    /**
     * Мегабайт
     */
    private const MB    = 'mb';
    /**
     * Гигабайт
     */
    private const GB    = 'gb';
    /**
     * Терабайт
     */
    private const TB    = 'tb';
}
