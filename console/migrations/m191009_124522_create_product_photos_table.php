<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_photos}}`.
 */
class m191009_124522_create_product_photos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%product_photos}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNulL(),
            'photo' => $this->string()->notNull(),
            'sort' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ], $tableOptions);
        $this->createIndex('index-product_photos-product_id', 'product_photos', 'product_id');
        $this->addForeignKey('fkey-product_photos-product_id', 'product_photos', 'product_id', 'products', 'id', 'RESTRICT', 'RESTRICT');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_photos}}');
    }
}
