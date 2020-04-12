<?php namespace LeMaX10\RegruCloudVPS\Repositories;

use LeMaX10\RegruCloudVPS\Contracts\Entities\ImageEntity as ImageEntityContract;
use LeMaX10\RegruCloudVPS\Contracts\Repositories\ImageRepository as ImageRepositoryContract;
use LeMaX10\RegruCloudVPS\Entities\ImageEntity;
use LeMaX10\RegruCloudVPS\Enums\ImageTypeEnum;
use LeMaX10\RegruCloudVPS\Traits\ItemsHelper;

class ImageRepository extends GuzzleRepository implements ImageRepositoryContract
{
    use ItemsHelper;

    /**
     * @inheritDoc
     */
    public function getAll(ImageTypeEnum $type): array
    {
        $request = $this->getClient()->get('images', [
            'query' => [
                'type' => $type->getValue()
            ]
        ]);
        $response = \json_decode($request->getBody()->getContents(), true);

        return $this->transform($response['images'] ?? [], static function (array $item): ImageEntityContract {
            return new ImageEntity($item);
        });
    }

    /**
     * @inheritDoc
     */
    public function getAllDestributions(): array
    {
        return $this->getAll(ImageTypeEnum::DISTRIBUTION());
    }

    /**
     * @inheritDoc
     */
    public function getAllApplications(): array
    {
        return $this->getAll(ImageTypeEnum::APPLICATION());
    }

    /**
     * @inheritDoc
     */
    public function getAllSnapshots(): array
    {
        return $this->getAll(ImageTypeEnum::SNAPSHOT());
    }

    /**
     * @inheritDoc
     */
    public function getAllBackups(): array
    {
        return $this->getAll(ImageTypeEnum::BACKUP());
    }

    /**
     * @inheritDoc
     */
    public function getByTypeAndId(ImageTypeEnum $type, int $id): ?ImageEntityContract
    {
        return $this->first($this->getAll($type), static function (ImageEntityContract $imageEntity) use($id): bool {
            return $imageEntity->getId() === $id;
        });
    }

    /**
     * @inheritDoc
     */
    public function getByTypeAndSlug(ImageTypeEnum $type, string $slug): ?ImageEntityContract
    {
        return $this->first($this->getAll($type), static function (ImageEntityContract $imageEntity) use($slug): bool {
            return $imageEntity->getSlug() === $slug;
        });
    }
}
