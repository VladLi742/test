<?php

use yii\db\Migration;

/**
 * Class m180110_194831_create_tables
 */
class m180110_194831_create_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
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
            'name' => $this->string(255),
        ]);
        $this->createTable('doctors', [
            'id' => $this->primaryKey(),
            'id_speciality' => $this->integer(),
            'name' => $this->char(64),
            'fired' => $this->boolean(),
        ]);
        $this->createTable('orders', [
            'id' => $this->primaryKey(),
            'id_doctor' => $this->integer(),
            'id_user' => $this->integer(),
            'date' => $this->date(),
        ]);
        $this->addForeignKey('id_speciality_4_doctor', 'doctors', 'id_speciality', 'specialities', 'id');
        $this->addForeignKey('id_doctor_4_orders', 'orders', 'id_doctor','doctors', 'id');
        $this->addForeignKey('id_user_4_order', 'orders', 'id_user', 'users', 'id');
    }
    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('orders');
        $this->dropTable('users');
        $this->dropTable('doctors');
        $this->dropTable('specialities');
    }
}
