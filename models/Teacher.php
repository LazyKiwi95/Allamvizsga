<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id
 * @property int $initials
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $email
 * @property string $phonenumber
 * @property string $password
 * @property int $active
 *
 * @property Classroom[] $classrooms
 * @property Feedback[] $feedbacks
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['initials', 'name', 'description', 'image', 'email', 'phonenumber', 'password', 'active'], 'required'],
            [['initials', 'active'], 'integer'],
            [['name'], 'string', 'max' => 80],
            [['description', 'image', 'password'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 150],
            [['phonenumber'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'initials' => 'Initials',
            'name' => 'Name',
            'description' => 'Description',
            'image' => 'Image',
            'email' => 'Email',
            'phonenumber' => 'Phonenumber',
            'password' => 'Password',
            'active' => 'Active',
        ];
    }

    /**
     * Gets query for [[Classrooms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClassrooms()
    {
        return $this->hasMany(Classroom::class, ['teacher_id' => 'id']);
    }

    /**
     * Gets query for [[Feedbacks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbacks()
    {
        return $this->hasMany(Feedback::class, ['teacher_id' => 'id']);
    }
}
