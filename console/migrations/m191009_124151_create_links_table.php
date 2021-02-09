<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%links}}`.
 */
class m191009_124151_create_links_table extends Migration
{
    /**f
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%links}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'icon' => $this->string()->notNull()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%links}}');
    }
}
