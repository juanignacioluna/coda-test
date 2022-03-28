<?php

namespace App\Handler\Client;

class SaveHandler extends \Mia\Auth\Request\MiaAuthRequestHandler{

    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface 
    {
        $user = $this->getUser($request);

        if($user->role === 2){

            $item = $this->getForEdit($request);

            $item->firstname = $this->getParam($request, 'firstname', '');
            $item->lastname = $this->getParam($request, 'lastname', '');        
            $item->email = $this->getParam($request, 'email', '');
            $item->phone = $this->getParam($request, 'phone', '');
            $item->photo = $this->getParam($request, 'photo', '');
    
            try {
                $item->save();
            } catch (\Exception $exc) {
                return new \Mia\Core\Diactoros\MiaJsonErrorResponse(-2, $exc->getMessage());
            }
    
            return new \Mia\Core\Diactoros\MiaJsonResponse($item->toArray());

        }else{

            return new \Mia\Core\Diactoros\MiaJsonErrorResponse(-2, 'No tienes permisos para realizar esta acción. Solo el Editor (Role=2) puede realizar esta acción.');

        }


    }
    
    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \App\Model\Client
     */
    protected function getForEdit(\Psr\Http\Message\ServerRequestInterface $request)
    {
        // Obtenemos ID si fue enviado
        $itemId = $this->getParam($request, 'id', '');
        // Buscar si existe el item en la DB
        $item = \App\Model\Client::find($itemId);
        // verificar si existe
        if($item === null){
            return new \App\Model\Client();
        }
        // Devolvemos item para editar
        return $item;
    }
}