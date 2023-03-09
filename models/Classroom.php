<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classroom".
 *
 * @property int $id
 * @property int|null $teacher_id
 * @property string $name
 * @property string $description
 * @property int $type
 * @property int $status
 *
 * @property Feedback[] $feedbacks
 * @property SubjectClassroom[] $subjectClassrooms
 * @property Teacher $teacher
 */
class Classroom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'classroom';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['teacher_id', 'type', 'status'], 'integer'],
            [['name', 'description', 'type', 'status'], 'required'],
            [['name'], 'string', 'max' => 80],
            [['description'], 'string', 'max' => 255],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::class, 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'teacher_id' => 'Teacher ID',
            'name' => 'Name',
            'description' => 'Description',
            'type' => 'Type',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Feedbacks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbacks()
    {
        return $this->hasMany(Feedback::class, ['classroom_id' => 'id']);
    }

    /**
     * Gets query for [[SubjectClassrooms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectClassrooms()
    {
        return $this->hasMany(SubjectClassroom::class, ['classroom_id' => 'id']);
    }

    /**
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::class, ['id' => 'teacher_id']);
    }
}
