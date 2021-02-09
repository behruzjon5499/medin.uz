<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%services}}`.
 */
class m200211_113646_add_experience_column_to_services_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('{{%services}}', 'experience', $this->string()->after('email'));
        $this->dropColumn('services', 'vendor_name');
        $this->dropColumn('services', 'factory_number');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropColumn('{{%services}}', 'experience');
        $this->addColumn('services', 'vendor_name', $this->string());
        $this->addColumn('services', 'factory_number', $this->string());
    }
}
