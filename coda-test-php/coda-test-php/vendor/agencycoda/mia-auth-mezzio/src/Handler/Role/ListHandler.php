<?php

namespace Mia\Auth\Handler\Role;

use Mia\Auth\Model\MIARole;
use Mia\Auth\Repository\MIARoleRepository;

/**
 * Description of ListHandler
 * 
 * @OA\Get(
 *     path="/mia-auth/role/list",
 *     summary="Get all roles",
 *     @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/MIARole")
 *     )
 * )
 *
 * @author matiascamiletti
 */
class ListHandler extends \Mia\Auth\Request\MiaAuthRequestHandler
{
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
        // Configurar query
        $configure = new \Mia\Database\Query\Configure($this, $request);
        // Obtenemos información
        $rows = MIARoleRepository::fetchByConfigure($configure);
        // Devolvemos respuesta
        return new \Mia\Core\Diactoros\MiaJsonResponse($rows->toArray());
    }
}