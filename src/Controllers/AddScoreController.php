<?php

declare(strict_types=1);


namespace App\Controllers;


use App\Models\ScoresModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AddScoreController
{
    private ScoresModel $model;

    public function __construct(ScoresModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $data = $request->getParsedBody();
        $name = $data['name'];
        $score = $data['score'];
        $sanitisedName = htmlspecialchars($name);
        $sanitisedScore = filter_var($score, FILTER_SANITIZE_NUMBER_INT);
        $responseBody = [
            'message' => 'Invalid data',
            'status' => 400,
            'data' => []
        ];
        if (strlen($sanitisedName) < 999) {
            $scores = $this->model->addScore($sanitisedName, intval($sanitisedScore));
            $responseBody = [
                'message' => 'Scores successfully added to db.',
                'status' => 200,
                'data' => $scores
            ];  
        }
        return $response->withJson($responseBody);
    }
}