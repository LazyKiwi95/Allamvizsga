<?php

use yii\db\Migration;

/**
 * Class m230309_221103_create_table_student_feedback
 */
class m230309_221103_create_table_student_feedback extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('student_feedback', [
            'id' => $this->primaryKey()->unsigned(),
            'student_id'=>$this->integer()->unsigned()->notNull(),
            'feedback_id'=>$this->integer()->unsigned()->notNull(),
            'answer'=> $this->string()->notNull(),
            'rating'=>$this->integer()->unsigned()->notNull(),
            'answered_at'=>$this->dateTime()->notNull()
        ]);

        $this->createIndex('idx_student_feedback_student_id', 'student_feedback', 'student_id');
        $this->addForeignKey('fk_student_feedback_student_id', 'student_feedback', 'student_id', 'student', 'id');

        $this->createIndex('idx_student_feedback_feedback_id', 'student_feedback', 'feedback_id');
        $this->addForeignKey('fk_student_feedback_feedback_id', 'student_feedback', 'feedback_id', 'feedback', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_student_feedback_student_id', 'student_feedback');
        $this->dropIndex('idx_student_feedback_student_id', 'student_feedback');

        $this->dropForeignKey('fk_student_feedback_feedback_id', 'student_feedback');
        $this->dropIndex('idx_student_feedback_feedback_id', 'student_feedback');

        $this->dropTable('student_feedback');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230309_221103_create_table_student_feedback cannot be reverted.\n";

        return false;
    }
    */
}
