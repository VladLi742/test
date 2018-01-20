<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $avatar
 * @property int $admin
 *
 * @property Order $orders
 * @property Doctor[] $ids
 * @property Speciality[] $ids0
 */
class SignInForm extends ActiveRecord
{
    public $password_repeat;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password', 'password_repeat'], 'required', 'message' => Yii::t('yii', 'Feel {attribute} for finishing the registration')],
            'admin' => [['admin'], 'integer'],
            'name' => [['name'], 'string', 'max' => 64],
            'email' => [['email'], 'string', 'max' => 32],
            'password' => [['password'], 'string', 'min' => 6, 'max' => 32],
            'password_repeat' => [['password_repeat'], 'compare', 'compareAttribute'=>'password'],
            ['email', 'email'],
            ['email', 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'name' => Yii::t('yii', 'Name'),
            'email' => Yii::t('yii', 'E-mail'),
            'password' => Yii::t('yii', 'Password'),
            'avatar' => Yii::t('yii', 'Avatar'),
            'admin' => Yii::t('yii', 'Admin'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasOne(Order::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIds()
    {
        return $this->hasMany(Doctor::className(), ['id' => 'id'])->viaTable('orders', ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIds0()
    {
        return $this->hasMany(Speciality::className(), ['id' => 'id'])->viaTable('orders', ['id' => 'id']);
    }
}