<?php

namespace Mia\Auth\Handler;

/**
 * Description of UpdateProfileHandler
 * 
 * @OA\Post(
 *     path="/mia-auth/update-profile",
 *     summary="Update User",
 *     tags={"Authentication"},
 *     @OA\RequestBody(
 *         description="Update user",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",                 
 *             @OA\Schema(
 *                  @OA\JsonContent(ref="#/components/schemas/MIAUser")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/MIAUser")
 *     )
 * )
 *
 * @author matiascamiletti
 */
class UpdateProfileHandler extends \Mia\Auth\Request\MiaAuthRequestHandler
{
    /**
     * Valores extras a guarda
     * @var array
     */
    protected $extras = [];
    
    public function __construct($extras = [])
    {
        $this->extras = $extras;
    }
    
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
        // Obtener usuario
        $item = $this->getUser($request);
        // Obtener valores
        $item->firstname = $this->getParam($request, 'firstname', '');
        if($item->firstname == ''){
            $item->firstname = 'empty';
        }
        $item->lastname = $this->getParam($request, 'lastname', '');
        $item->photo = $this->getParam($request, 'photo', '');
        $item->phone = $this->getParam($request, 'phone', '');
        // Procesar valores extras
        foreach($this->extras as $extra){
            $item->{$extra} = $this->getParam($request, $extra, '');
        }
        // Verificar si cambio el email
        $newEmail = $this->getParam($request, 'email', '');
        if($newEmail != $item->email){
            // Verificar si existe el nuevo email
            if(\Mia\Auth\Model\MIAUser::where('email', $newEmail)->first() !== null){
                return new \Mia\Core\Diactoros\MiaJsonErrorResponse(-3, 'El nuevo email ya existe!');
            }
            $item->email = $newEmail;
        }else{
            $item->email = $newEmail;
        }
        $item->save();
        // Devolvemos datos del usuario
        return new \Mia\Core\Diactoros\MiaJsonResponse($item->toArray());
    }
}