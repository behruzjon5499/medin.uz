<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%products}}`.
 */
class m200130_093227_add_user_id_column_to_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%products}}', 'user_id', $this->string()->after('main_photo'));



    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%products}}', 'user_id');
    }
}
