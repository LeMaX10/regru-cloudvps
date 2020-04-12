<?php namespace LeMaX10\RegruCloudVPS\Repositories;

use LeMaX10\RegruCloudVPS\Contracts\Entities\TariffEntity as TariffEntityContract;
use LeMaX10\RegruCloudVPS\Contracts\Repositories\TariffRepository as TariffRepositoryContract;
use LeMaX10\RegruCloudVPS\Entities\TariffEntity;
use LeMaX10\RegruCloudVPS\Traits\ItemsHelper;

class TariffRepository extends GuzzleRepository implements TariffRepositoryContract
{
    use ItemsHelper;

    /**
     * @inheritDoc
     */
    public function getAll(): array
    {
        $request  = $this->getClient()->get('sizes');
        $response = \json_decode($request->getBody()->getContents(), true);

        return $this->transform($response['sizes'] ?? [], static function (array $item): TariffEntityContract {
            return new TariffEntity($item);
        });
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): ?TariffEntityContract
    {
        return $this->first($this->getAll(), static function (TariffEntityContract $tariffEntity) use($id): bool {
            return $tariffEntity->getId() === $id;
        });
    }

    /**
     * @inheritDoc
     */
    public function getBySlug(string $slug): ?TariffEntityContract
    {
        return $this->first($this->getAll(), static function (TariffEntityContract $tariffEntity) use($slug): bool {
            return $tariffEntity->getSlug() === $slug;
        });
    }
}
