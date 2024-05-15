<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Notification extends Model
{
    public $name;

    /**
     * @return array the validation rules.
     */
    public function rules(): array
    {
        return [
            [['name'], 'required'],
        ];
    }
}
