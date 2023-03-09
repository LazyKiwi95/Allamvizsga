<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $neptun_code
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $image
 * @property string $registered_at
 * @property int $status
 *
 * @property ClassroomStudent[] $classroomStudents
 * @property StudentFeedback[] $studentFeedbacks
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['neptun_code', 'name', 'email', 'password', 'image', 'registered_at', 'status'], 'required'],
            [['registered_at'], 'safe'],
            [['status'], 'integer'],
            [['neptun_code'], 'string', 'max' => 15],
            [['name'], 'string', 'max' => 80],
            [['email'], 'string', 'max' => 150],
            [['password', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'neptun_code' => 'Neptun Code',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'image' => 'Image',
            'registered_at' => 'Registered At',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[ClassroomStudents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClassroomStudents()
    {
        return $this->hasMany(ClassroomStudent::class, ['student_id' => 'id']);
    }

    /**
     * Gets query for [[StudentFeedbacks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentFeedbacks()
    {
        return $this->hasMany(StudentFeedback::class, ['student_id' => 'id']);
    }
}
