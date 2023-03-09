<?php

use yii\db\Migration;

/**
 * Class m230309_212722_create_table_teacher
 */
class m230309_212722_create_table_teacher extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('teacher', [
            'id' =>$this->primaryKey()->unsigned(),
            'initials'=>$this->boolean()->notNull(),
            'name'=>$this->string(80)->notNull(),
            'description'=>$this->string()->notNull(),
            'image'=>$this->string()->notNull(),
            'email'=>$this->string(150)->notNull(),
            'phonenumber'=>$this->string(50)->notNull(),
            'password'=>$this->string(255)->notNull(),
            'active'=>$this->boolean()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('teacher');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230309_212722_create_table_teacher cannot be reverted.\n";

        return false;
    }
    */
}
