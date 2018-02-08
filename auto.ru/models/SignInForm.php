<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class SignInForm extends Model
{
    public $name;
    public $login;
    public $email;
    public $password;
    public $password_repeat;
    public $avatar;
    public $imageFile;
    public $remember_me;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'login', 'email', 'password', 'password_repeat', 'imageFile'], 'required', 'message' => 'Необходимо заполнить поле "{attribute}".'],
            'name' => [['name'], 'string', 'min' => 6, 'max' => 64],
            'login' => [['login'], 'string', 'max' => 64],
            'email' => [['email'], 'string', 'max' => 32],
            'password' => [['password'], 'string', 'min' => 6, 'max' => 60],
            'password_repeat' => [['password_repeat'], 'compare', 'compareAttribute'=>'password'],
            'imageFile' => [['imageFile'], 'file', 'skipOnEmpty' => false, 'maxSize' => '1048576', 'extensions' => 'png'],
            ['name', 'match', 'pattern' => '/^(\W+) (\W+) (\W+)?(!\d|[,.!?;:()]?)+$/', 'message' => 'ФИО должно содержать только кириллицу, пробелы, без цифр и знаков препинания'],
            ['email', 'email'],
            ['email', 'unique'],
            ['remember_me', 'boolean'],
            ['password', 'match', 'pattern' => '/^(?=.*[A-Z])(?=.*[a-z]).*$/', 'message' => 'Пароль должен содержать не менее 6 символов английской раскладки, верхнего и нижнего регистра'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'ФИО',
            'login' => 'Логин',
            'email' => 'Email',
            'password' => 'Пароль',
            'password_repeat' => 'Подтверждение пароля',
            'imageFile' => 'Загрузить фото',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     */
    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            $password = User::find()->where(['password' => $this->password, 'login' => $this->login]);

            if (!$password) {
                $this->addError($attribute, 'Incorrect login or password.');
            }
        }
    }

    /**
     * Finds user by [[login]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByLogin($this->login);
        }

        return $this->_user;
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
