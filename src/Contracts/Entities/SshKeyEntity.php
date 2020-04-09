<?php namespace LeMaX10\RegruCloudVPS\Contracts\Entities;


/**
 * Interface SshKeyEntity
 * @package LeMaX10\RegruCloudVPS\Contracts\Entities
 */
interface SshKeyEntity
{
    /**
     * Уникальный идентификатор ключа
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Имя ключа
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Отпечаток ключа
     *
     * @return string
     */
    public function getFingerprint(): string;

    /**
     * Содержание (тело) ключа
     *
     * @return string
     */
    public function getPublicKey(): string;

    /**
     * Изменить имя ключа
     *
     * @param string $name
     * @return SshKeyEntity
     */
    public function setName(string $name): SshKeyEntity;
}
