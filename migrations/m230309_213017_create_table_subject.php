<?php

use yii\db\Migration;

/**
 * Class m230309_213017_create_table_subject
 */
class m230309_213017_create_table_subject extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('subject', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(80)->notNull(),
            'grade' =>$this->integer(10)->notNull(),
            'code' => $this->string(10)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('subject');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230309_213017_create_table_subject cannot be reverted.\n";

        return false;
    }
    */
}
