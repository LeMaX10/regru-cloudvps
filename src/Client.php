<?php namespace LeMaX10\RegruCloudVPS;


use LeMaX10\RegruCloudVPS\Repositories\GuzzleRepository;

/**
 * Class Client
 * @package LeMaX10\RegruCloudVPS
 */
class Client
{
    /**
     * @var array
     */
    protected $config;
    /**
     * @var \Guzzle\Http\Client
     */
    protected $client;
    /**
     * @var array
     */
    protected $loadedRepositories = [];

    /**
     * Client constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        $this->client = new \Guzzle\Http\Client([
            'base_uri' => $this->config['url'],
            'headers'  => [
                'Authorization' => 'Bearer '. $this->config['token']
            ]
        ]);
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (!isset($this->loadedRepositories[$name])) {
            $this->loadedRepositories[$name] = $this->loadRepository($name);
        }

        return $this->loadedRepositories[$name];
    }

    /**
     * @param string $name
     * @return GuzzleRepository|null
     */
    public function loadRepository(string $name): ?GuzzleRepository
    {
        if ($repository = $this->hasRepository($name)) {
            return new $repository($this->client);
        }

        return null;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function hasRepository(string $name): ?string
    {
        $studly = ucwords(str_replace(['-','_'], ' ', $name));
        $repositoryName = ucfirst(str_replace(' ', '', $studly)) .'Repository';
        $repositoryNamespace = 'LeMaX10\\Repositories\\'. $repositoryName;

        return class_exists($repositoryNamespace) ? $repositoryName : null;
    }
}
