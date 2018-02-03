<?php

use yii\db\Migration;

/**
 * Class m180203_170445_default_tables
 */
class m180203_170445_default_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'name' => $this->char(32),
            'login' => $this->char(32),
            'email' => $this->char(32),
            'password' => $this->char(60),
            'avatar' => $this->string(),
        ]);

        $this->createTable('services', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'date' => $this->date(),
            'places' => $this->integer(),
        ]);

        $this->createTable('orders', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer(),
            'id_service' => $this->integer(),
            'date' => $this->date(),
        ]);

        $this->addForeignKey('user_4_orders', 'orders', 'id_user', 'users', 'id');
        $this->addForeignKey('service_4_orders', 'orders', 'id_service', 'services', 'id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('orders');
        $this->dropTable('services');
        $this->dropTable('users');
    }
}
