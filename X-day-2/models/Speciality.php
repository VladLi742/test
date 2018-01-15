<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "specialities".
 *
 * @property int $id
 *
 * @property Doctor $doctors
 * @property Order $orders
 * @property Doctor[] $ids
 * @property User[] $ids0
 * @property Doctor $id0
 */
class Speciality extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'specialities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctors()
    {
        return $this->hasOne(Doctor::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasOne(Order::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIds()
    {
        return $this->hasMany(Doctor::className(), ['id' => 'id'])->viaTable('orders', ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIds0()
    {
        return $this->hasMany(User::className(), ['id' => 'id'])->viaTable('orders', ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Doctor::className(), ['id' => 'id']);
    }
}
