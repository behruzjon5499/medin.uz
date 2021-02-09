<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%distributors_and_links}}`.
 */
class m191009_124341_create_distributors_and_links_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%distributors_and_links}}', [
            'distributor_id' => $this->integer()->notNull(),
            'link_id' => $this->integer()->notNull(),
            'url' => $this->string()->notNull()
        ], $tableOptions);
        $this->addPrimaryKey('primaryKey-distributors_and_links', 'distributors_and_links', ['distributor_id', 'link_id']);

        $this->createIndex('index-distributors_and_links-link_id', 'distributors_and_links', 'link_id');
        $this->addForeignKey('fkey-distributors_and_links-link_id', 'distributors_and_links', 'link_id', 'links', 'id', 'RESTRICT', 'RESTRICT');

        $this->createIndex('index-distributors_and_links-distributor_id', 'distributors_and_links', 'distributor_id');
        $this->addForeignKey('fkey-distributors_and_links-distributor_id', 'distributors_and_links', 'distributor_id', 'distributors', 'id', 'RESTRICT', 'RESTRICT');



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%distributors_and_links}}');
    }
}
