<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%services}}`.
 */
class m191009_135138_create_services_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%services}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'organization_name' => $this->string()->notNull(),
            'vendor_name' => $this->string()->notNull(),
            'factory_number' => $this->string(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'description_ru' => $this->text()->notNull(),
            'description_uz' => $this->text()->notNull(),
            'description_en' => $this->text()->notNull(),

        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%services}}');
    }
}
