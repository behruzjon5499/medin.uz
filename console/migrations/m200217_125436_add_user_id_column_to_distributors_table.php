<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%distributors}}`.
 */
class m200217_125436_add_user_id_column_to_distributors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {

        $this->dropForeignKey(
            'fkey-products-distributor_id',
            'products'
        );
        $this->dropIndex(
            'index-products-distributor_id',
            'products'
        );
        $this->dropColumn('products', 'distributor_id');
        $this->addColumn('{{%distributors}}', 'user_id', $this->integer()->after('phone'));
        $this->addColumn('{{%distributors}}', 'site', $this->string()->after('phone'));

        $this->createIndex('index-distributors-user_id', 'distributors', 'user_id');
        $this->addForeignKey('fkey-distributors-user_id', 'distributors', 'user_id', 'user', 'id', 'RESTRICT', 'RESTRICT');

    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->addColumn('{{%products}}', 'distributor_id', $this->integer());
        $this->addForeignKey('fkey-products-distributor_id', 'products', 'distributor_id', 'distributors', 'id', 'RESTRICT', 'RESTRICT');
        $this->dropColumn('{{%distributors}}', 'user_id');
        $this->dropColumn('{{%distributors}}', 'site');
        $this->dropForeignKey('fkey-distributors-user_id', 'distributors');
    }
}
