<?php

use yii\db\Migration;
use Faker\Factory;

class m180113_102518_default_data extends Migration
{
    public function safeUp()
    {
        $oFaker = Factory::create('ru_RU');

        for ($i = 1; $i <=100; $i++ )
            $this->insert('users',[
                'name' => $oFaker->name(),
                'email' => $oFaker->email,
                'password' => $oFaker->password(),
            ]);

        $this->insert('users',[
            'name' => 'admin',
            'email' => 'admin@health.ru',
            'password' => Yii::$app->getSecurity()->generatePasswordHash('WwSsRr'),
            'avatar' => '/uploads/user-icon.png',
            'admin' => true,
        ]);

        $aUsers = (new \yii\db\Query())->from('users')->all();

        for ($i = 1; $i <=10; $i++ )
            $this->insert('specialities',[
                'name' => $oFaker->jobTitle,
            ]);

        $aSpec = (new \yii\db\Query())->from('specialities')->all();

        for ($i = 1; $i <=100; $i++ )
            $this->insert('doctors',[
                'name' => $oFaker->name(),
                'id_speciality' => $aSpec[array_rand($aSpec)]['id'],
                'fired' => $oFaker->boolean()
            ]);

        $aDoctors = (new \yii\db\Query())->from('doctors')->all();

        for ($i = 1; $i <=100; $i++ )
            $this->insert('orders',[
                'id_doctor' => $aDoctors[array_rand($aDoctors)]['id'],
                'id_user' => $aUsers[array_rand($aUsers)]['id'],
                'date' => $oFaker->date()
            ]);

    }

    public function safeDown()
    {

    }

}
