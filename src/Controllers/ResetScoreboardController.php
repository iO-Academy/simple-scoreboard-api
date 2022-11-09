<?php

declare(strict_types=1);


namespace App\Controllers;


use App\Models\ScoresModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ResetScoreboardController
{
    private ScoresModel $model;

    // Here, the parameter is automatically supplied by the Dependency Injection Container based on the type hint
    public function __construct(ScoresModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $data = $request->getParsedBody();
        $responseBody = [
            'message' => 'Error',
            'status' => 403,
            'data' => []
        ];
        if ($data['pass'] === 'bananas') {
            $scores = $this->model->resetScoreboard();
            $responseBody = [
                'message' => 'Scores successfully reset in db.',
                'status' => 200,
                'data' => []
            ];
        }
        return $response->withJson($responseBody);
    }
}