<?php namespace LeMaX10\RegruCloudVPS\Contracts\Repositories;

use LeMaX10\RegruCloudVPS\Contracts\Entities\ImageEntity;
use LeMaX10\RegruCloudVPS\Enums\ImageTypeEnum;

/**
 * Interface ImagesRepository
 * @package LeMaX10\RegruCloudVPS\Contracts\Repositories
 */
interface ImageRepository
{
    /**
     * Получить список образов
     *
     * @param ImageTypeEnum $type
     * @return array
     */
    public function getAll(ImageTypeEnum $type): array;

    /**
     * Получить список образов шаблонов операционных систем
     *
     * @return array
     */
    public function getAllDestributions(): array;

    /**
     * Получить список образов шаблонов приложений
     *
     * @return array
     */
    public function getAllApplications(): array;

    /**
     * Получить список образов снэпшотов
     *
     * @return array
     */
    public function getAllSnapshots(): array;

    /**
     * Получить список образов бэкапов
     *
     * @return array
     */
    public function getAllBackups(): array;

    /**
     * Вернуть образ по его типу и идентификатору
     *
     * @param ImageTypeEnum $type
     * @param int $id
     * @return ImageEntity|null
     */
    public function getByTypeAndId(ImageTypeEnum $type, int $id): ?ImageEntity;

    /**
     * Вернуть образ по его типу и slug
     *
     * @param ImageTypeEnum $type
     * @param string $slug
     * @return ImageEntity|null
     */
    public function getByTypeAndSlug(ImageTypeEnum$type, string $slug): ?ImageEntity;
}
