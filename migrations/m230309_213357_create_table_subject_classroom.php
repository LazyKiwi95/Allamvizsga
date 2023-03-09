<?php

use yii\db\Migration;

/**
 * Class m230309_213357_create_table_subject_classroom
 */
class m230309_213357_create_table_subject_classroom extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('subject_classroom', [
            'id' => $this->primaryKey()->unsigned(),
            'subject_id' =>$this->integer()->unsigned()->notNull(),
            'classroom_id' =>$this->integer()->unsigned()->notNull()
        ]);

        $this->createIndex('idx_subject_classroom_subject_id','subject_classroom','subject_id');
        $this->addForeignKey('fk_subject_classroom_subject_id', 'subject_classroom', 'subject_id', 'subject', 'id');

        $this->createIndex('idx_subject_classroom_classroom_id','subject_classroom','classroom_id');
        $this->addForeignKey('fk_subject_classroom_classroom_id', 'subject_classroom', 'classroom_id', 'classroom', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_subject_classroom_subject_id', 'subject_classroom');
        $this->dropIndex('idx_subject_classroom_subject_id', 'subject_classroom');

        $this->dropForeignKey('fk_subject_classroom_classroom_id', 'subject_classroom');
        $this->dropIndex('idx_subject_classroom_classroom_id', 'subject_classroom');

        $this->dropTable('subject_classroom');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230309_213357_create_table_subject_classroom cannot be reverted.\n";

        return false;
    }
    */
}
