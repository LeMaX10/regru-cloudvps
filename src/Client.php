<?php namespace LeMaX10\RegruCloudVPS;


use LeMaX10\RegruCloudVPS\Actions\ServerAction;
use LeMaX10\RegruCloudVPS\Contracts\Actions\ServerAction as ServerActionContract;
use LeMaX10\RegruCloudVPS\Contracts\CloudVpnClient;
use LeMaX10\RegruCloudVPS\Contracts\Repositories\ImageRepository as ImageRepositoryContract;
use LeMaX10\RegruCloudVPS\Contracts\Repositories\IpRepository as IpRepositoryContract;
use LeMaX10\RegruCloudVPS\Contracts\Repositories\ServerRepository as ServerRepositoryContract;
use LeMaX10\RegruCloudVPS\Contracts\Repositories\SnapshotRepository as SnapshotRepositoryContract;
use LeMaX10\RegruCloudVPS\Contracts\Repositories\SshKeyRepository as SshKeyRepositoryContract;
use LeMaX10\RegruCloudVPS\Contracts\Repositories\TariffRepository as TariffRepositoryContract;
use GuzzleHttp\Client as GuzzleClient;
use LeMaX10\RegruCloudVPS\Repositories\ImageRepository;
use LeMaX10\RegruCloudVPS\Repositories\IpRepository;
use LeMaX10\RegruCloudVPS\Repositories\ServerRepository;
use LeMaX10\RegruCloudVPS\Repositories\SnapshotRepository;
use LeMaX10\RegruCloudVPS\Repositories\SshKeyRepository;
use LeMaX10\RegruCloudVPS\Repositories\TariffRepository;

/**
 * Class Client
 * @package LeMaX10\RegruCloudVPS
 */
class Client implements CloudVpnClient
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var GuzzleClient
     */
    protected $client;

    /**
     * Client constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @return GuzzleClient
     */
    public function getClient(): GuzzleClient
    {
        if (!$this->client) {
            $this->client = new GuzzleClient([
                'base_uri' => $this->config['url'],
                'headers'  => [
                    'Authorization' => 'Bearer ' . $this->config['token']
                ]
            ]);
        }

        return $this->client;
    }

    /**
     * @inheritDoc
     */
    public function images(): ImageRepositoryContract
    {
        return new ImageRepository($this->getClient());
    }

    /**
     * @inheritDoc
     */
    public function ips(): IpRepositoryContract
    {
        return new IpRepository($this->getClient());
    }

    /**
     * @inheritDoc
     */
    public function servers(): ServerRepositoryContract
    {
        return new ServerRepository($this->getClient());
    }

    /**
     * @inheritDoc
     */
    public function snapshots(): SnapshotRepositoryContract
    {
        return new SnapshotRepository($this->getClient());
    }

    /**
     * @inheritDoc
     */
    public function sshkeys(): SshKeyRepositoryContract
    {
        return new SshKeyRepository($this->getClient());
    }

    /**
     * @inheritDoc
     */
    public function tariffs(): TariffRepositoryContract
    {
        return new TariffRepository($this->getClient());
    }

    /**
     * @inheritDoc
     */
    public function serverAction(): ServerActionContract
    {
        return new ServerAction($this->getClient());
    }
}
