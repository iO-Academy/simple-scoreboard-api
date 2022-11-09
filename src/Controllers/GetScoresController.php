<?php

declare(strict_types=1);


namespace App\Controllers;


use App\Models\ScoresModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class GetScoresController
{
    private ScoresModel $model;

    // Here, the parameter is automatically supplied by the Dependency Injection Container based on the type hint
    public function __construct(ScoresModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $scores = $this->model->getScores();
        $responseBody = [
            'message' => 'Scores successfully retrieved from db.',
            'status' => 200,
            'data' => $scores
        ];
        return $response->withJson($responseBody);
    }
}