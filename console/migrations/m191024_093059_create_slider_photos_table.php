<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%slider_photos}}`.
 */
class m191024_093059_create_slider_photos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%slider_photos}}', [
            'id' => $this->primaryKey(),
            'slider_id' => $this->integer()->notNulL(),
            'photo' => $this->string()->notNull(),
            'sort' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ], $tableOptions);
        $this->createIndex('index-slider_photos-slider_id', 'slider_photos', 'slider_id');
        $this->addForeignKey('fkey-slider_photos-slider_id', 'slider_photos', 'slider_id', 'sliders', 'id', 'RESTRICT', 'RESTRICT');
        $this->createIndex('index-slider_photos-created_by', 'slider_photos', 'created_by');
        $this->addForeignKey('fkey-slider_photos-created_by', 'slider_photos', 'created_by', 'user', 'id', 'RESTRICT', 'RESTRICT');
        $this->createIndex('index-slider_photos-updated_by', 'slider_photos', 'updated_by');
        $this->addForeignKey('fkey-slider_photos-updated_by', 'slider_photos', 'updated_by', 'user', 'id', 'RESTRICT', 'RESTRICT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%slider_photos}}');
    }
}
