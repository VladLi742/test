<?php

use yii\db\Migration;
//use Faker\Factory;

/**
 * Class m180110_194831_create_tables
 */
class m180110_194831_create_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'name' => $this->char(64),
            'email' => $this->char(32),
            'password' => $this->char(32),
            'avatar' => $this->text(),
            'admin' => $this->boolean(),
        ]);

        $this->createTable('specialities', [
            'id' => $this->primaryKey(),
        ]);

        $this->createTable('doctors', [
            'id' => $this->primaryKey(),
            'name' => $this->char(64),
            'fired' => $this->boolean(),
        ]);

        $this->createTable('orders', [
            'id' => $this->primaryKey(),
            'date' => $this->date(),
        ]);

        $this->addForeignKey('id_speciality', 'doctors', 'id', 'specialities', 'id');
        $this->addForeignKey('id_doctor', 'specialities', 'id', 'doctors', 'id');
        $this->addForeignKey('id_doctor_doctors', 'orders', 'id','doctors', 'id');
        $this->addForeignKey('id_speciality_specialities', 'orders', 'id', 'specialities', 'id');
        $this->addForeignKey('id_user_users', 'orders', 'id', 'users', 'id');

//        $faker = Factory::create();

//        $name = $faker->name;
//        $email = $faker->email;
//        $password = $faker->password;
        $name = 'Иванов Иван Иванович';
        $email = 'ivan@gmail.com';
        $password = '123';

        $this->insert('users',[
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'avatar' => 'sadasd',
            'admin' => false,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('users');
        $this->dropTable('specialities');
        $this->dropTable('doctors');
        $this->dropTable('orders');
    }
}
