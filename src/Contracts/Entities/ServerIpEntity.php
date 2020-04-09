<?php namespace LeMaX10\RegruCloudVPS\Contracts\Entities;


/**
 * Interface ServerIpEntity
 * @package LeMaX10\RegruCloudVPS\Contracts\Entities
 */
interface ServerIpEntity
{
    /**
     * основной IP-адрес сервера
     *
     * @return string
     */
    public function getIpv4(): string;

    /**
     * IPv6-адрес сервера
     *
     * @return string|null
     */
    public function getIpv6(): ?string;
}
