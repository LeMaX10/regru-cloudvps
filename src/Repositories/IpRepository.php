<?php namespace LeMaX10\RegruCloudVPS\Repositories;

use LeMaX10\RegruCloudVPS\Contracts\Entities\IpAddressEntity as IpAddressEntityContract;
use LeMaX10\RegruCloudVPS\Contracts\Repositories\IpRepository as IpRepositoryContract;
use LeMaX10\RegruCloudVPS\Entities\IpAddressEntity;
use LeMaX10\RegruCloudVPS\Enums\IpTypeEnum;
use LeMaX10\RegruCloudVPS\Traits\ItemsHelper;

/**
 * Class IpRepository
 * @package LeMaX10\RegruCloudVPS\Repositories
 */
class IpRepository extends GuzzleRepository implements IpRepositoryContract
{
    use ItemsHelper;

    /**
     * @inheritDoc
     */
    public function getAll(): array
    {
        $request = $this->getClient()->get('ips');
        $response = \json_decode($request->getBody()->getContents(), true);

        return $this->transform($response['ips'] ?? [], static function (array $item): IpAddressEntityContract {
            return new IpAddressEntity($item);
        });
    }

    /**
     * @inheritDoc
     */
    public function getAllActive(): array
    {
        return $this->filter($this->getAll(), static function (IpAddressEntityContract $ipAddressEntity): bool {
            return $ipAddressEntity->getStatus() === 'active';
        });
    }

    /**
     * @inheritDoc
     */
    public function getAllByServerId(int $serverId): array
    {
        return $this->filter($this->getAll(), static function (IpAddressEntityContract $ipAddressEntity) use($serverId): bool {
            return $ipAddressEntity->getRegletId() === $serverId;
        });
    }

    /**
     * @inheritDoc
     */
    public function getAllByType(IpTypeEnum $type): array
    {
        return $this->filter($this->getAll(), static function (IpAddressEntityContract $ipAddressEntity) use($type): bool {
            return $ipAddressEntity->getType()->equals($type);
        });
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): ?IpAddressEntityContract
    {
        return $this->first($this->getAll(), static function (IpAddressEntityContract $ipAddressEntity) use($id): bool {
            return $ipAddressEntity->getId() === $id;
        });
    }

    /**
     * @inheritDoc
     */
    public function delete(IpAddressEntityContract $ipAddressEntity): bool
    {
        $request = $this->getClient()->delete('ips/'. $ipAddressEntity->getIp());
        return $request->getResponse()->getStatusCode() === 204;
    }
}
