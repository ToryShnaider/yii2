<?php

use yii\db\Migration;

/**
 * Handles the creation of table `userFiles`.
 */
class m190204_133704_create_userFiles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('userFiles', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'name' => $this->string(255)->notNull(),
            'path' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('userFiles');
    }
}
