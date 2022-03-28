<?php

namespace App\Handler\Client;

class AssignHandler extends \Mia\Auth\Request\MiaAuthRequestHandler{

    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface{

        $clientId = $this->getParam($request, 'clientId', '');

        $projectId = $this->getParam($request, 'projectId', '');

        $project = \App\Model\Project::find($projectId);

        if($project === null){
            return \App\Factory\ErrorFactory::notExist();
        }

        $project->client_id = $clientId;

        $project->save();

        return new \Mia\Core\Diactoros\MiaJsonResponse(true);

    }
}