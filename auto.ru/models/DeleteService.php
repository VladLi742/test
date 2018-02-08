<?php

namespace app\models;

use yii\base\Model;

class DeleteService extends Model
{
    public $name;

    public function rules()
    {
        return [
            [['name'], 'required'],
            ['name', 'string'],
            ['name', 'validateName'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название услуги',
        ];
    }

    public function validateName()
    {
        $service = Service::findOne(['name' => $this->name]);
        $order = Order::find()->where(['id_service' => $service->id]);

        if (!$service) {
            return $this->addError('name', 'Услуга не существует.');
        } else {
            \Yii::$app
                ->db
                ->createCommand()
                ->delete('orders', ['id_service' => $service->id])
                ->execute();
            $service->delete();
            return true;
        }
    }

    public function validateService()
    {
        Service::findOne(['']);
    }
}