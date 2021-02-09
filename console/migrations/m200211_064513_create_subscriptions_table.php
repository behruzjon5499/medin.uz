<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subscriptions}}`.
 */
class m200211_064513_create_subscriptions_table extends Migration
{
    /**
     *
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%subscriptions}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'tariff_id' => $this->integer()->notNull(),
            'start_time' => $this->integer()->notNull(),
            'end_time' => $this->integer()->notNull(),
            'status' => $this->integer()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->createIndex('index-subscriptions-user_id', 'subscriptions', 'user_id');
        $this->addForeignKey('fkey-subscriptions-user_id', 'subscriptions', 'user_id', 'user', 'id', 'RESTRICT', 'RESTRICT');

        $this->createIndex('index-subscriptions-tariff_id', 'subscriptions', 'tariff_id');
        $this->addForeignKey('fkey-subscriptions-tariff_id', 'subscriptions', 'tariff_id', 'tariffs', 'id', 'RESTRICT', 'RESTRICT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%subscriptions}}');
    }
}
