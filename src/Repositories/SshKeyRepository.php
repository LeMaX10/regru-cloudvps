<?php namespace LeMaX10\RegruCloudVPS\Repositories;

use Guzzle\Http\Message\RequestInterface;
use LeMaX10\RegruCloudVPS\Contracts\Entities\SshKeyEntity as SshKeysEntityContract;
use LeMaX10\RegruCloudVPS\Contracts\Repositories\SshKeyRepository as SshKeyRepositoryContract;
use LeMaX10\RegruCloudVPS\Entities\SshKeyEntity;
use LeMaX10\RegruCloudVPS\Exceptions\ErrorSaveEntityException;
use LeMaX10\RegruCloudVPS\Traits\ItemsHelper;
use Psr\Http\Message\ResponseInterface;

/**
 * Class SshKeysRepository
 * @package LeMaX10\RegruCloudVPS\Repositories
 */
class SshKeyRepository extends GuzzleRepository implements SshKeyRepositoryContract
{
    use ItemsHelper;

    /**
     * @inheritDoc
     */
    public function getAll(): array
    {
        $request = $this->getClient()->get('account/keys');
        $response = \json_decode($request->getBody()->getContents(), true);

        return $this->transform($response['ssh_keys'] ?? [], static function(array $item): SshKeysEntityContract {
            return new SshKeyEntity($item);
        });
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): ?SshKeysEntityContract
    {
        return $this->first($this->getAll(), static function (SshKeysEntityContract $sshKeyEntity) use($id): bool {
            return $sshKeyEntity->getId() === $id;
        });
    }

    /**
     * @inheritDoc
     */
    public function save(SshKeysEntityContract $keyEntity): SshKeysEntityContract
    {
        $request  = empty($keyEntity->getFingerprint()) ? $this->createKey($keyEntity) : $this->updateKey($keyEntity);
        $response = \json_decode($request->getBody()->getContents(), true);
        $sshKey   = $response['ssh_key'] ?? null;
        if (empty($sshKey)) {
            throw new ErrorSaveEntityException(static::class, $request->getResponse()->getMessage());
        }

        return new SshKeyEntity($sshKey);
    }

    /**
     * @inheritDoc
     */
    public function delete(SshKeysEntityContract $keyEntity): bool
    {
        $request = $this->getClient()->delete('account/keys/'. $keyEntity->getFingerprint());
        return $request->getResponse()->getStatusCode() === 204;
    }

    /**
     * @param SshKeysEntityContract $keyEntity
     * @return ResponseInterface
     */
    private function createKey(SshKeysEntityContract $keyEntity): ResponseInterface
    {
        return $request = $this->getClient()->post('account/keys', [
            'json' => $keyEntity->toArray()
        ]);
    }

    /**
     * @param SshKeysEntityContract $keyEntity
     * @return ResponseInterface
     */
    private function updateKey(SshKeysEntityContract $keyEntity): ResponseInterface
    {
        return $request = $this->getClient()->put('account/keys/'. $keyEntity->getFingerprint(), [
            'json' => $keyEntity->toArray()
        ]);
    }
}
