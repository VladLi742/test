<?php

namespace app\models;

use yii\base\Model;
use DateTime;

class AddServiceForm extends Model
{
    public $name;
    public $start_date;
    public $final_date;
    public $places;

    public function rules()
    {
        return [
            [['name', 'start_date', 'final_date', 'places'], 'required'],
            ['name', 'safe'],
            ['start_date', 'validateDate'],
            ['final_date', 'validateDate'],
            ['places', 'safe'],
        ];
    }

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

    public function addInDb() {
        $model = new Service();

        return (bool)$model->save();
    }
}