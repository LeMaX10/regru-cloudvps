<?php namespace LeMaX10\RegruCloudVPS\Repositories;

use LeMaX10\RegruCloudVPS\Contracts\Repositories\SnapshotRepository as SnapshotRepositoryContract;
use LeMaX10\RegruCloudVPS\Contracts\Entities\ImageEntity as ImageEntityContract;
use LeMaX10\RegruCloudVPS\Entities\ImageEntity;

class SnapshotRepository extends GuzzleRepository implements SnapshotRepositoryContract
{
    use ItemsHelper;

    /**
     * @inheritDoc
     */
    public function getAll(): array
    {
        $request  = $this->getClient()->get('snapshots');
        $response = \json_decode($request->getBody()->getContents(), true);

        return $this->transform($response['snapshots'] ?? [], static function (array $item): ImageEntityContract {
            return new ImageEntity($item);
        });
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): ?ImageEntityContract
    {
        return $this->first($this->getAll(), static function (ImageEntityContract $imageEntity) use($id): bool {
            return $imageEntity->getId() === $id;
        });
    }

    /**
     * @inheritDoc
     */
    public function getBySlug(string $slug): ?ImageEntityContract
    {
        return $this->first($this->getAll(), static function (ImageEntityContract $imageEntity) use($slug): bool {
            return $imageEntity->getSlug() === $slug;
        });
    }

    /**
     * @inheritDoc
     */
    public function delete(ImageEntityContract $imageEntity): bool
    {
        $request = $this->getClient()->delete('snapshots/'. $imageEntity->getId());
        return $request->getResponse()->getStatusCode() === 204;
    }
}
