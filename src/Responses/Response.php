<?php namespace LeMaX10\RegruCloudVPS\Responses;


use Guzzle\Http\Message\RequestInterface;

/**
 * Class Response
 * @package LeMaX10\RegruCloudVPS\Responses
 */
abstract  class Response
{
    /**
     * @var array
     */
    protected $response;

    /**
     * Response constructor.
     * @param RequestInterface $request
     */
    public function __construct(RequestInterface $request)
    {
        $this->response = \json_decode($request->getBody(), true);
    }
}
