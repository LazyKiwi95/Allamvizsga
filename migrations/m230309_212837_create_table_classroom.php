<?php

use yii\db\Migration;

/**
 * Class m230309_212837_create_table_classroom
 */
class m230309_212837_create_table_classroom extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('classroom', [
            'id' => $this->primaryKey()->unsigned(),
            'teacher_id' => $this->integer()->unsigned(),
            'name' => $this->string(80)->notNull(),
            'description' => $this->string()->notNull(),
            'type' => $this->boolean()->notNull(),
            'status' => $this->boolean()->notNull()
        ]);

        $this->createIndex('idx_classroom_teacher_id', 'classroom', 'teacher_id');
        $this->addForeignKey('fk_classroom_teacher_id', 'classroom', 'teacher_id', 'teacher', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_classroom_teacher_id', 'classroom');
        $this->dropIndex('idx_classroom_teacher_id', 'classroom');
        $this->dropTable('classroom');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230309_212837_create_table_classroom cannot be reverted.\n";

        return false;
    }
    */
}
