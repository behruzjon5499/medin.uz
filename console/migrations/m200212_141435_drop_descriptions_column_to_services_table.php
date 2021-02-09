<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%services}}`.
 */
class m200212_141435_drop_descriptions_column_to_services_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->dropColumn('services', 'description_uz');
        $this->dropColumn('services', 'description_en');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->addColumn('{{%services}}', 'description_uz', $this->text());
        $this->addColumn('{{%services}}', 'description_en', $this->text());
    }
}
