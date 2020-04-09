<?php namespace LeMaX10\RegruCloudVPS\Contracts\Entities;


use Carbon\Carbon;
use LeMaX10\RegruCloudVPS\Enums\ActionStatusEnum;

/**
 * Interface ActionEntity
 * @package LeMaX10\RegruCloudVPS\Contracts\Entities
 */
interface ActionEntity
{
    /**
     * Уникальный идентификатор задания в очереди
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Тип задания (его суть)
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Состояние задачи
     *
     * @return ActionStatusEnum
     */
    public function getStatus(): ActionStatusEnum;

    /**
     * Регион, куда было отправлено задание
     *
     * @return string
     */
    public function getRegionSlug(): string;

    /**
     * Ресурс
     * @return ActionResourceEntity
     */
    public function getResource(): ActionResourceEntity;

    /**
     * Дата и время добавления задания
     *
     * @return Carbon
     */
    public function getCreatedAt(): Carbon;

    /**
     * Дата и время запуска отложенного задания
     *
     * @return Carbon|null
     */
    public function getStartedAt(): ?Carbon;

    /**
     * Дата и время выполнения задания
     *
     * @return Carbon|null
     */
    public function getCompletedAt(): ?Carbon;
}
