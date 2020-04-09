<?php namespace LeMaX10\RegruCloudVPS\Exceptions;


use Throwable;

class ErrorSaveEntityException extends \Exception
{
    public function __construct(string $repositoryClass, string $error, Throwable $previous = null)
    {
        parent::__construct(sprintf("Entity in repository [%s] not save. Error: %s", [$repositoryClass, $error]), 400, $previous);
    }
}
