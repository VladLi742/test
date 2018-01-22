<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "specialities".
 *
 * @property int $id
 * @property string $name
 *
 * @property Doctor[] $doctors
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
            [['name'], 'string', 'max' => 255, 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Специальность',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctors()
    {
        return $this->hasMany(Doctor::className(), ['id_speciality' => 'id']);
    }
}
