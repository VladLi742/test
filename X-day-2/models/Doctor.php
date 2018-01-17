<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctors".
 *
 * @property int $id
 * @property int $id_speciality
 * @property string $name
 * @property int $fired
 *
 * @property Speciality $speciality
 * @property Order[] $orders
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_speciality', 'fired'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['id_speciality'], 'exist', 'skipOnError' => true, 'targetClass' => Speciality::className(), 'targetAttribute' => ['id_speciality' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_speciality' => Yii::t('app', 'Id Speciality'),
            'name' => Yii::t('app', 'Name'),
            'fired' => Yii::t('app', 'Fired'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpeciality()
    {
        return $this->hasOne(Speciality::className(), ['id' => 'id_speciality']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id_doctor' => 'id']);
    }
}
