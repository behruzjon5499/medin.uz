<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m191009_124442_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'title_ru' =>$this->string(),
            'title_uz' =>$this->string(),
            'title_en' =>$this->string(),
            'distributor_id' => $this->integer()->notNull(),
            'catalog_id' => $this->integer()->notNull(),
            'main_photo' => $this->string()->notNull(),
            'price' => $this->integer()->notNull(),
            'old_price' => $this->integer()->notNull(),
            'sale_status' => $this->integer()->defaultValue(0),
            'sale_endtime' => $this->integer(),
            'sale_description' => $this->text(),
            'description_ru' => $this->text()->notNull(),
            'description_uz' => $this->text()->notNull(),
            'description_en' => $this->text()->notNull(),
            'status' => $this->integer()->defaultValue(0),
            'view' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->createIndex('index-products-distributor_id', 'products', 'distributor_id');
        $this->addForeignKey('fkey-products-distributor_id', 'products', 'distributor_id', 'distributors', 'id', 'RESTRICT', 'RESTRICT');

        $this->createIndex('index-products-catalog_id', 'products', 'catalog_id');
        $this->addForeignKey('fkey-products-catalog_id', 'products', 'catalog_id', 'catalogs', 'id', 'RESTRICT', 'RESTRICT');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products}}');
    }
}
