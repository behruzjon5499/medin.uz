<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m200211_103857_add_inn_number_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'inn_number', $this->string()->after('phone_reserve'));
         $this->addColumn('{{%user}}', 'organization_name', $this->string()->after('phone_reserve'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'inn_number');
        $this->dropColumn('{{%user}}', 'organization_name');
    }
}
