<?php

namespace App\Handler\Client;

class FetchHandler extends \Mia\Auth\Request\MiaAuthRequestHandler
{
    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface
    {

        $itemId = $this->getParam($request, 'id', '');

        $item = \App\Model\Client::find($itemId);

        if($item === null){
            return \App\Factory\ErrorFactory::notExist();
        }
        
        return new \Mia\Core\Diactoros\MiaJsonResponse($item->toArray());
    }
}