<?php

namespace app\models;

use yii\base\Model;
use DateTime;

class ChoiceServiceForm extends Model
{
    public $id;
    public $name;
    public $date;

    public function rules()
    {
        return [
            [['name', 'date'], 'required'],
            ['id', 'safe'],
            ['name', 'safe'],
            ['date', 'validateDate'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Специальность врача',
            'date' => 'Желаемая дата',
        ];
    }

    /**
     * Validates the date.
     * This method serves as the inline validation for date.
     */
    public function validateDate()
    {
        if (!$this->hasErrors()) {
            $tomorrow = new DateTime('tomorrow');

            if ($this->date >= $tomorrow->format('Y-m-d') === false) {
                $this->addError('date', 'Дата записи должна быть назначена за сутки до приёма.');
            }
        }
    }
}