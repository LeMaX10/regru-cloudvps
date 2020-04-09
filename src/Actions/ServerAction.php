<?php namespace LeMaX10\RegruCloudVPS\Actions;

use Guzzle\Http\Message\RequestInterface;
use LeMaX10\RegruCloudVPS\Contracts\Actions\ServerAction as ServerActionContract;
use LeMaX10\RegruCloudVPS\Contracts\Entities\ActionEntity as ActionEntityContract;
use LeMaX10\RegruCloudVPS\Contracts\Entities\ImageEntity;
use LeMaX10\RegruCloudVPS\Contracts\Entities\ServerEntity as ServerEntityContract;
use LeMaX10\RegruCloudVPS\Contracts\Entities\TariffEntity;
use LeMaX10\RegruCloudVPS\Contracts\Responses\ServerCreateResponse;
use LeMaX10\RegruCloudVPS\Entities\ActionEntity;
use LeMaX10\RegruCloudVPS\Entities\ServerEntity;
use LeMaX10\RegruCloudVPS\Enums\PowerEnum;
use LeMaX10\RegruCloudVPS\Responses\CreateServerResponse;

/**
 * Class ServerAction
 * @package LeMaX10\RegruCloudVPS\Actions
 */
class ServerAction extends Action implements ServerActionContract
{
    /**
     * @inheritDoc
     */
    public function create(TariffEntity $tariffEntity, ImageEntity $imageEntity, ?string $name = null, ?array $sshKeys = [], bool $backup = false): ServerCreateResponse
    {
        $request = $this->client->post('reglets', [
            'json' => [
                'size'  => $tariffEntity->getSlug(),
                'image' => $imageEntity->getSlug(),
                'name'  => $name,
                'ssh_keys' => $sshKeys,
                'backup' => $backup ? 'true' : 'false'
            ]
        ]);

        return new CreateServerResponse($request);
    }

    /**
     * @inheritDoc
     */
    public function reboot(ServerEntityContract $serverEntity): ActionEntityContract
    {
        $request  = $this->sendAction($serverEntity->getId(), ['type' => 'reboot']);
        $response = \json_decode($request->getBody(), true);
        if (empty($response['action'])) {
            throw new \Exception('Error reboot server');
        }

        return new ActionEntity($response['action']);
    }

    /**
     * @inheritDoc
     */
    public function rename(ServerEntityContract $serverEntity, string $name): ServerEntityContract
    {
        $request  = $this->client->put('reglets/'. $serverEntity->getId(), [
            'json' => [
                'name' => $name
            ]
        ]);
        $response = \json_decode($request->getBody(), true);
        if (empty($response['reglet'])) {
            throw new \Exception('Error rename server');
        }

        return new ServerEntity($response['reglet']);
    }

    /**
     * @inheritDoc
     */
    public function changeTariff(ServerEntityContract $serverEntity, TariffEntity $tariffEntity): ActionEntityContract
    {
        $request = $this->sendAction($serverEntity->getId(), [
            "type" => "resize",
            "size" => $tariffEntity->getSlug()
        ]);
        $response = \json_decode($request->getBody(), true);
        if (empty($response['action'])) {
            throw new \Exception('Error change tariff server');
        }

        return new ActionEntity($response['action']);
    }

    /**
     * @inheritDoc
     */
    public function resetPassword(ServerEntityContract $serverEntity): ActionEntityContract
    {
        $request = $this->sendAction($serverEntity->getId(), [
            "type" => "password_reset",
        ]);
        $response = \json_decode($request->getBody(), true);
        if (empty($response['action'])) {
            throw new \Exception('Error reset password server');
        }

        return new ActionEntity($response['action']);
    }

    /**
     * @inheritDoc
     */
    public function rebuild(ServerEntityContract $serverEntity, ImageEntity $imageEntity): ActionEntityContract
    {
        $request = $this->sendAction($serverEntity->getId(), [
            "type" => "rebuild",
            "image" => $imageEntity->getSlug()
        ]);
        $response = \json_decode($request->getBody(), true);
        if (empty($response['action'])) {
            throw new \Exception('Error rebuild server');
        }

        return new ActionEntity($response['action']);
    }

    /**
     * @inheritDoc
     */
    public function power(ServerEntityContract $serverEntity, PowerEnum $powerEnum): ActionEntityContract
    {
        $request = $this->sendAction($serverEntity->getId(), [
            "type" => $powerEnum->getValue()
        ]);
        $response = \json_decode($request->getBody(), true);
        if (empty($response['action'])) {
            throw new \Exception('Error '. $powerEnum->getValue() .'  server');
        }

        return new ActionEntity($response['action']);
    }

    /**
     * @inheritDoc
     */
    public function backup(ServerEntityContract $serverEntity, bool $state): ActionEntityContract
    {
        $type = $state ? 'enable_backups' : 'disable_backups';
        $request = $this->sendAction($serverEntity->getId(), [
            "type" => $type
        ]);
        $response = \json_decode($request->getBody(), true);
        if (empty($response['action'])) {
            throw new \Exception('Error '. $type .' server');
        }

        return new ActionEntity($response['action']);
    }

    /**
     * @inheritDoc
     */
    public function restore(ServerEntityContract $serverEntity, ImageEntity $imageEntity): ActionEntityContract
    {
        $request = $this->sendAction($serverEntity->getId(), [
            "type"  => 'restore',
            'image' => $imageEntity->getId()
        ]);
        $response = \json_decode($request->getBody(), true);
        if (empty($response['action'])) {
            throw new \Exception('Error restore server');
        }

        return new ActionEntity($response['action']);
    }

    /**
     * @param int $id
     * @param array $params
     * @return RequestInterface
     */
    private function sendAction(int $id, array $params): RequestInterface
    {
        return $this->client->post('reglets/'. $id .'/actions', [
            'json' => $params
        ]);
    }
}
