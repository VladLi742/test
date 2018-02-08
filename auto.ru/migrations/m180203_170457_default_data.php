<?php

use yii\db\Migration;

/**
 * Class m180203_170457_default_data
 */
class m180203_170457_default_data extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $oFaker = \Faker\Factory::create('ru_RU');

        $this->insert('users', [
            'name' => 'Администратор',
            'login' => 'admin',
            'email' => 'admin@auto.ru',
            'password' => 'wsr2018',
        ]);

        for ($i = 1; $i <= 100; $i++) {
            $this->insert('users', [
                'name' => $oFaker->name,
                'login' => $oFaker->userName,
                'email' => $oFaker->email,
                'password' => $oFaker->password,
            ]);
        }

        $aUsers = (new \yii\db\Query())->from('users')->all();

        for ($i = 1; $i <= 24; $i++) {
            $this->insert('services', [
                'name' => $oFaker->country,
                'start_date' => $oFaker->date(),
                'final_date' => $oFaker->date(),
                'places' => $oFaker->randomNumber('3'),
            ]);
        }

        $aServices = (new \yii\db\Query())->from('services')->all();

        for ($i = 1; $i <= 265; $i++) {
            $this->insert('orders', [
                'id_user' => $aUsers[array_rand($aUsers)]['id'],
                'id_service' => $aServices[array_rand($aServices)]['id'],
                'date' => $oFaker->date(),
            ]);
        }
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {

    }
}
