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
            [['name', 'id_speciality'], 'required'],
            [['fired'], 'boolean'],
            [['id_speciality'], 'string'],
            [['name'], 'string', 'max' => 64],
            [['id_speciality'], 'exist', 'skipOnError' => true, 'targetClass' => Speciality::className(), 'targetAttribute' => ['id_speciality' => 'id']],
            ['name', 'match', 'pattern' => '/^(\W+) (\W+) (\W+)?(!\d|[,.!?;:()]?)+$/', 'message' => 'ФИО должно содержать только кириллицу, пробелы, без цифр и знаков препинания'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_speciality' => 'Специальность',
            'name' => 'ФИО',
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

    public function freeDate($date)
    {
        $freeDate = Order::find()
                ->where(['date' => $date, 'id_doctor' => '1'])
                ->count();
        if ($freeDate == 5) {
            $freeDate = false;
        }

        return $freeDate;
    }
}
