<?php

namespace App\Classes;

class Request
{
    private array $queryParams;
    private array $postParams;
    private array $serverParams;

    public function __construct(array $queryParams, array $postParams, array $serverParams)
    {
        $this->queryParams = $queryParams;
        $this->postParams = $postParams;
        $this->serverParams = $serverParams;
    }

    /**
     * @return array
     */
    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    /**
     * @return array
     */
    public function getPostParams(): array
    {
        return $this->postParams;
    }

    /**
     * @return array
     */
    public function getServerParams(): array
    {
        return $this->serverParams;
    }
}