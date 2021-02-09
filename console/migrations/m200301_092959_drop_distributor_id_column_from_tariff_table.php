<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%tariff}}`.
 */
class m200301_092959_drop_distributor_id_column_from_tariff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->dropForeignKey(
            'fkey-tariffs-distributor_id',
            'tariffs'
        );
        $this->dropIndex(
            'index-tariffs-distributor_id',
            'tariffs'
        );
        $this->dropColumn('tariffs', 'distributor_id');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->addColumn('{{%tariffs}}', 'distributor_id', $this->integer());
        $this->addForeignKey('fkey-tariffs-distributor_id', 'tariffs', 'distributor_id', 'distributors', 'id', 'RESTRICT', 'RESTRICT');

    }
}
