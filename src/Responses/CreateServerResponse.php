<?php namespace LeMaX10\RegruCloudVPS\Responses;

use LeMaX10\RegruCloudVPS\Contracts\Entities\ActionEntity as ActionEntityContract;
use LeMaX10\RegruCloudVPS\Contracts\Entities\ServerEntity as ServerEntityContract;
use LeMaX10\RegruCloudVPS\Contracts\Responses\ServerCreateResponse as CreateServerResponseContract;
use LeMaX10\RegruCloudVPS\Entities\ActionEntity;
use LeMaX10\RegruCloudVPS\Entities\ServerEntity;
use LeMaX10\RegruCloudVPS\Traits\ItemsHelper;

/**
 * Class CreateServerResponse
 * @package LeMaX10\RegruCloudVPS\Responses
 */
class CreateServerResponse implements CreateServerResponseContract
{
    use ItemsHelper;

    /**
     * @inheritDoc
     */
    public function getActions(): array
    {
        return $this->transform($this->response['actions'] ?? [], static function ($item): ActionEntityContract {
            return new ActionEntity($item);
        });
    }

    /**
     * @inheritDoc
     */
    public function getServer(): ServerEntityContract
    {
        return new ServerEntity($this->response['server']);
    }
}
