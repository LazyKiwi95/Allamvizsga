<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student_feedback".
 *
 * @property int $id
 * @property int $student_id
 * @property int $feedback_id
 * @property string $answer
 * @property int $rating
 * @property string $answered_at
 *
 * @property Feedback $feedback
 * @property Student $student
 */
class StudentFeedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'feedback_id', 'answer', 'rating', 'answered_at'], 'required'],
            [['student_id', 'feedback_id', 'rating'], 'integer'],
            [['answered_at'], 'safe'],
            [['answer'], 'string', 'max' => 255],
            [['feedback_id'], 'exist', 'skipOnError' => true, 'targetClass' => Feedback::class, 'targetAttribute' => ['feedback_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::class, 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'feedback_id' => 'Feedback ID',
            'answer' => 'Answer',
            'rating' => 'Rating',
            'answered_at' => 'Answered At',
        ];
    }

    /**
     * Gets query for [[Feedback]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFeedback()
    {
        return $this->hasOne(Feedback::class, ['id' => 'feedback_id']);
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
}
