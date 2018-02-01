<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public $auth_key;

    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required',],
            'email' => [['email'], 'string', 'max' => 32],
            'password' => [['password'], 'string', 'min' => 6, 'max' => 60],
            ['email', 'email'],
        ];
    }

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
    public function attributeLabels()
    {
        return [
            'email' => 'Электронная почта',
            'password' => 'Пароль',
        ];
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['password' => $token]);
    }

    /**
     * Finds user by name
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
