<?php

use yii\db\Migration;

/**
 * Class m230309_220051_create_table_feedback
 */
class m230309_220051_create_table_feedback extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('feedback', [
            'id' => $this->primaryKey()->unsigned(),
            'classroom_id'=>$this->integer()->unsigned()->notNull(),
            'teacher_id'=>$this->integer()->unsigned()->notNull(),
            'name'=> $this->string(80)->notNull(),
            'description'=> $this->string()->notNull(),
            'type'=> $this->boolean()->notNull(),
            'created_at'=>$this->dateTime()->notNull(),
            'published_at'=>$this->dateTime()->notNull(),
            'status'=>$this->string()->notNull(),
            'published' => $this->boolean()->notNull(),
            'overall_rating'=>$this->integer()->unsigned()->notNull()
        ]);

        $this->createIndex('idx_feedback_classroom_id', 'feedback', 'classroom_id');
        $this->addForeignKey('fk_feedback_classroom_id', 'feedback', 'classroom_id', 'classroom', 'id');

        $this->createIndex('idx_feedback_teacher_id', 'feedback', 'teacher_id');
        $this->addForeignKey('fk_feedback_teacher_id', 'feedback', 'teacher_id', 'teacher', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_feedback_classroom_id', 'feedback');
        $this->dropIndex('idx_feedback_classroom_id', 'feedback');

        $this->dropForeignKey('fk_feedback_teacher_id', 'feedback');
        $this->dropIndex('idx_feedback_teacher_id', 'feedback');

        $this->dropTable('feedback');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230309_220051_create_table_feedback cannot be reverted.\n";

        return false;
    }
    */
}
