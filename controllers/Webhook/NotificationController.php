<?php

namespace app\controllers\Webhook;

use app\enums\Message\MessageEnum;
use app\services\Messages\MessageService;
use Yii;
use yii\rest\ActiveController;

class NotificationController extends ActiveController
{
    public $modelClass = 'app\models\Notification';

    public function actionLogInfo()
    {
        if (isset(Yii::$app->request->post()['name']) && $data = Yii::$app->request->post()) {
            Yii::info($data, MessageEnum::getLogCategory($data['name']));
            $payload = json_decode($data['payload']);
            if ($data['name'] === 'new message' && $payload->message->text === Yii::$app->params['teletype']['phrase']) {
                (new MessageService)->sendPongResponse($payload);
            }
        }

        Yii::$app->response->statusCode = 204;
    }
}