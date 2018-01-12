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
 * @property Orders $orders
 * @property Doctors[] $ids
 * @property Specialities[] $ids0
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

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
            [['avatar'], 'string'],
            [['admin'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['email', 'password'], 'string', 'max' => 32],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png'],
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
        return $this->hasOne(Orders::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIds()
    {
        return $this->hasMany(Doctors::className(), ['id' => 'id'])->viaTable('orders', ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIds0()
    {
        return $this->hasMany(Specialities::className(), ['id' => 'id'])->viaTable('orders', ['id' => 'id']);
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
