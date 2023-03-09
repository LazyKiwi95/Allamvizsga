<?php

use yii\db\Migration;

/**
 * Class m230309_215443_create_table_classroom_student
 */
class m230309_215443_create_table_classroom_student extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('classroom_student', [
            'id' => $this->primaryKey()->unsigned(),
            'subject_classroom_id' =>$this->integer()->unsigned()->notNull(),
            'student_id' =>$this->integer()->unsigned()->notNull()
        ]);

        $this->createIndex('idx_classroom_student_subject_classroom_id','classroom_student','subject_classroom_id');
        $this->addForeignKey('fk_classroom_student_subject_classroom_id', 'classroom_student', 'subject_classroom_id', 'subject_classroom', 'id');

        $this->createIndex('idx_classroom_student_student_id','classroom_student','student_id');
        $this->addForeignKey('fk_classroom_student_student_id', 'classroom_student', 'student_id', 'student', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_classroom_student_subject_classroom_id', 'classroom_student');
        $this->dropIndex('idx_classroom_student_subject_classroom_id', 'classroom_student');

        $this->dropForeignKey('fk_classroom_student_student_id', 'classroom_student');
        $this->dropIndex('idx_classroom_student_student_id', 'classroom_student');

        $this->dropTable('classroom_student');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230309_215443_create_table_classroom_student cannot be reverted.\n";

        return false;
    }
    */
}
