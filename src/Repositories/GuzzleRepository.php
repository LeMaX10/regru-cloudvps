<?php namespace LeMaX10\RegruCloudVPS\Repositories;


use Guzzle\Http\Client;
use LeMaX10\RegruCloudVPS\Contracts\Repositories\Repository;

/**
 * Class GuzzleRepository
 * @package LeMaX10\RegruCloudVPS\Repositories
 */
abstract class GuzzleRepository
{
    /** @var Client  */
    protected $client;

    /**
     * GuzzleRepository constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }
}
