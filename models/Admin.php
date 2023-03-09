<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property int $id
 * @property string $name
 * @property string $password
 * @property string $email
 * @property int $acces_level
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'password', 'email', 'acces_level'], 'required'],
            [['acces_level'], 'integer'],
            [['name'], 'string', 'max' => 80],
            [['password'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'password' => 'Password',
            'email' => 'Email',
            'acces_level' => 'Acces Level',
        ];
    }
}
