<?php

namespace App\Handler\Client;

use Carbon\Carbon;

class DashboardHandler extends \Mia\Auth\Request\MiaAuthRequestHandler{

    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface{

        $date = Carbon::now()->subDays(7);

        $items = \App\Model\Client::where('created_at', '>=', $date)->get();

        return new \Mia\Core\Diactoros\MiaJsonResponse("En los últimos 7 días se crearon " . count($items->toArray()) . " clientes.");

    }
}