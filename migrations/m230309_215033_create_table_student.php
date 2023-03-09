<?php

use yii\db\Migration;

/**
 * Class m230309_215033_create_table_student
 */
class m230309_215033_create_table_student extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('student', [
            'id' => $this->primaryKey()->unsigned(),
            'neptun_code' => $this->string(15)->notNull(),
            'name' => $this->string(80)->notNull(),
            'email' => $this->string(150)->notNull(),
            'password' => $this->string(255)->notNull(),
            'image'=>$this->string()->notNull(),
            'registered_at'=>$this->dateTime()->notNull(),
            'status' =>$this->boolean()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('student');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230309_215033_create_table_student cannot be reverted.\n";

        return false;
    }
    */
}
