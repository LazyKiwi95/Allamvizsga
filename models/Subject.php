<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property int $id
 * @property string $name
 * @property int $grade
 * @property string $code
 *
 * @property SubjectClassroom[] $subjectClassrooms
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'grade', 'code'], 'required'],
            [['grade'], 'integer'],
            [['name'], 'string', 'max' => 80],
            [['code'], 'string', 'max' => 10],
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
            'grade' => 'Grade',
            'code' => 'Code',
        ];
    }

    /**
     * Gets query for [[SubjectClassrooms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectClassrooms()
    {
        return $this->hasMany(SubjectClassroom::class, ['subject_id' => 'id']);
    }
}
