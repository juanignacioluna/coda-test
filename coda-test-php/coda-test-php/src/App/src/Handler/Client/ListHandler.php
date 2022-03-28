<?php

namespace App\Handler\Client;

class ListHandler extends \Mia\Auth\Request\MiaAuthRequestHandler{

    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface{

        $configure = new \Mia\Database\Query\Configure($this, $request);

        $rows = \App\Repository\ClientRepository::fetchByConfigure($configure);

        return new \Mia\Core\Diactoros\MiaJsonResponse($rows->toArray());

    }
}