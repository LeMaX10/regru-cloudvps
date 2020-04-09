<?php namespace LeMaX10\RegruCloudVPS\Repositories;

use LeMaX10\RegruCloudVPS\Contracts\Entities\ServerEntity as ServerEntityContract;
use LeMaX10\RegruCloudVPS\Contracts\Repositories\ServerRepository as ServerRepositoryContract;
use LeMaX10\RegruCloudVPS\Entities\ServerEntity;
use LeMaX10\RegruCloudVPS\Traits\ItemsHelper;

/**
 * Class ServerRepository
 * @package LeMaX10\RegruCloudVPS\Repositories
 */
class ServerRepository extends GuzzleRepository implements ServerRepositoryContract
{
    use ItemsHelper;

    /**
     * @inheritDoc
     */
    public function getAll(): array
    {
        $request = $this->getClient()->get('reglets');
        $response = \json_decode($request->getBody(), true);

        return $this->transform($response['reglets'] ?? [], static function (array $item): ServerEntityContract {
             return new ServerEntity($item);
        });
    }

    /**
     * @inheritDoc
     */
    public function getAllByStatus(array $status): array
    {
        return $this->filter($this->getAll(), static function (ServerEntityContract $serverEntity) use($status): bool {
            return \in_array($serverEntity->getStatus(), $status);
        });
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): ?ServerEntityContract
    {
        return $this->first($this->getAll(), static function (ServerEntityContract $serverEntity) use($id): bool {
            return $serverEntity->getId() === $id;
        });
    }

    /**
     * @inheritDoc
     */
    public function delete(ServerEntityContract $serverEntity): bool
    {
        $request = $this->getClient()->delete('reglets/'. $serverEntity->getId());
        return $request->getResponse()->getStatusCode() === 204;
    }
}
