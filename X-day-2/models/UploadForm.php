<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class UploadForm extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @var UploadedFile
     */
    public $avatar;

    public function rules()
    {
        return [
            [['avatar'], 'required'],
            'avatar' => [['avatar'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->avatar->saveAs('uploads/' . $this->avatar->baseName . '.' . $this->avatar->extension);
            return true;
        } else {
            return false;
        }
    }
}