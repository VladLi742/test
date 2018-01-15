<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\validators\ImageValidator;

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
class User extends \yii\db\ActiveRecord
{

    public $imageFile;
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
            [['name', 'email', 'password', 'password_repeat', 'imageFile'], 'required'],
            'avatar' => [['avatar'], 'string'],
            'admin' => [['admin'], 'integer'],
            'name' => [['name'], 'string', 'max' => 64],
            'email' => [['email'], 'string', 'max' => 32],
            'password' => [['password'], 'string', 'max' => 32],
            'password_repeat' => ['password_repeat', 'compare', 'compareAttribute'=>'password'],
            'imageFile' => [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png'],
            ['email', 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'avatar' => Yii::t('app', 'Avatar'),
            'admin' => Yii::t('app', 'Admin'),
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

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
