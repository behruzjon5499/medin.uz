<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%orders}}`.
 */
class m200205_131345_add_user_id_column_to_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%orders}}', 'user_id', $this->integer()->after('phone'));

        $this->createIndex('index-orders-user_id', 'orders', 'user_id');
        $this->addForeignKey('fkey-orders-user_id', 'orders', 'user_id', 'user', 'id', 'RESTRICT', 'RESTRICT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%orders}}', 'user_id');
    }
}
