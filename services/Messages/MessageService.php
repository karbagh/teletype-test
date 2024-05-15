<?php

namespace app\services\Messages;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use stdClass;
use Yii;

class MessageService
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => Yii::$app->params['teletype']['host']
        ]);
    }

    public function sendPongResponse(stdClass $data): void
    {
        $this->client->request(
            'POST',
             'message/send',
            [
                'headers' => [
                    'X-Auth-Token' => Yii::$app->params['teletype']['token'],
                    'Accept' => 'application/json',
                ],
                'form_params' => [
                    'dialogId' => $data->message->dialogId,
                    'text' => 'pong!',
                ]
            ]
        );
    }
}