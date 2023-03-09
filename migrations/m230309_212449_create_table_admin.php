<?php

use yii\db\Migration;

/**
 * Class m230309_212449_create_table_admin
 */
class m230309_212449_create_table_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('admin', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(80)->notNull(),
            'password' => $this->string(255)->notNull(),
            'email' => $this->string(150)->notNull(),
            'acces_level' =>$this->boolean()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('admin');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230309_212449_create_table_admin cannot be reverted.\n";

        return false;
    }
    */
}
