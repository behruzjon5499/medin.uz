<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tariffs}}`.
 */
class m191010_121018_create_tariffs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%tariffs}}', [
            'id' => $this->primaryKey(),
            'title_ru' => $this->string(),
            'title_uz' => $this->string(),
            'title_en' => $this->string(),
            'order_count' => $this->integer()->notNull(),
            'distributor_count' => $this->integer()->notNull(),
            'distributor_id' => $this->integer()->notNull(),
            'photo' =>$this->string()->notNull(),
            'description_ru' => $this->text()->notNull(),
            'description_uz' => $this->text()->notNull(),
            'description_en' => $this->text()->notNull(),

        ], $tableOptions);
        $this->createIndex('index-tariffs-distributor_id', 'tariffs', 'distributor_id');
        $this->addForeignKey('fkey-tariffs-distributor_id', 'tariffs', 'distributor_id', 'distributors', 'id', 'RESTRICT', 'RESTRICT');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tariffs}}');
    }
}
