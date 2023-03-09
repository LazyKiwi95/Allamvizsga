<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject_classroom".
 *
 * @property int $id
 * @property int $subject_id
 * @property int $classroom_id
 *
 * @property Classroom $classroom
 * @property ClassroomStudent[] $classroomStudents
 * @property Subject $subject
 */
class SubjectClassroom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject_classroom';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_id', 'classroom_id'], 'required'],
            [['subject_id', 'classroom_id'], 'integer'],
            [['classroom_id'], 'exist', 'skipOnError' => true, 'targetClass' => Classroom::class, 'targetAttribute' => ['classroom_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::class, 'targetAttribute' => ['subject_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject_id' => 'Subject ID',
            'classroom_id' => 'Classroom ID',
        ];
    }

    /**
     * Gets query for [[Classroom]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClassroom()
    {
        return $this->hasOne(Classroom::class, ['id' => 'classroom_id']);
    }

    /**
     * Gets query for [[ClassroomStudents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClassroomStudents()
    {
        return $this->hasMany(ClassroomStudent::class, ['subject_classroom_id' => 'id']);
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::class, ['id' => 'subject_id']);
    }
}
