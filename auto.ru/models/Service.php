<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string $name
 * @property string $start_date
 * @property string $final_date
 * @property int $places
 *
 * @property Order[] $orders
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_date', 'final_date'], 'safe'],
            [['places'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Название услуги',
            'start_date' => 'Дата начала',
            'final_date' => 'Дата окончания',
            'places' => 'Кол-во мест',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id_service' => 'id']);
    }
}
