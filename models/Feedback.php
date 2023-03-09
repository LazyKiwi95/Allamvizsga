<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property int $classroom_id
 * @property int $teacher_id
 * @property string $name
 * @property string $description
 * @property int $type
 * @property string $created_at
 * @property string $published_at
 * @property string $status
 * @property int $published
 * @property int $overall_rating
 *
 * @property Classroom $classroom
 * @property StudentFeedback[] $studentFeedbacks
 * @property Teacher $teacher
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['classroom_id', 'teacher_id', 'name', 'description', 'type', 'created_at', 'published_at', 'status', 'published', 'overall_rating'], 'required'],
            [['classroom_id', 'teacher_id', 'type', 'published', 'overall_rating'], 'integer'],
            [['created_at', 'published_at'], 'safe'],
            [['name'], 'string', 'max' => 80],
            [['description', 'status'], 'string', 'max' => 255],
            [['classroom_id'], 'exist', 'skipOnError' => true, 'targetClass' => Classroom::class, 'targetAttribute' => ['classroom_id' => 'id']],
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
            'classroom_id' => 'Classroom ID',
            'teacher_id' => 'Teacher ID',
            'name' => 'Name',
            'description' => 'Description',
            'type' => 'Type',
            'created_at' => 'Created At',
            'published_at' => 'Published At',
            'status' => 'Status',
            'published' => 'Published',
            'overall_rating' => 'Overall Rating',
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
     * Gets query for [[StudentFeedbacks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentFeedbacks()
    {
        return $this->hasMany(StudentFeedback::class, ['feedback_id' => 'id']);
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
