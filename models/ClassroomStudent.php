<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classroom_student".
 *
 * @property int $id
 * @property int $subject_classroom_id
 * @property int $student_id
 *
 * @property Student $student
 * @property SubjectClassroom $subjectClassroom
 */
class ClassroomStudent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'classroom_student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_classroom_id', 'student_id'], 'required'],
            [['subject_classroom_id', 'student_id'], 'integer'],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::class, 'targetAttribute' => ['student_id' => 'id']],
            [['subject_classroom_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubjectClassroom::class, 'targetAttribute' => ['subject_classroom_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject_classroom_id' => 'Subject Classroom ID',
            'student_id' => 'Student ID',
        ];
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::class, ['id' => 'student_id']);
    }

    /**
     * Gets query for [[SubjectClassroom]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectClassroom()
    {
        return $this->hasOne(SubjectClassroom::class, ['id' => 'subject_classroom_id']);
    }
}
