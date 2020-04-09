<?php namespace LeMaX10\RegruCloudVPS\Actions;


use Guzzle\Http\Client;
use LeMaX10\RegruCloudVPS\Contracts\Action as ActionContract;

/**
 * Class Action
 * @package LeMaX10\RegruCloudVPS\Actions
 */
abstract class Action
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @param Client $client
     */
    public function setClient(Client $client): void
    {
        $this->client = $client;
    }
}
