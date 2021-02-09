<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%library}}`.
 */
class m200205_131439_add_direction_id_column_to_library_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%library}}', 'direction_id', $this->integer()->after('photo'));

        $this->createIndex('index-library-direction_id', 'library', 'direction_id');
        $this->addForeignKey('fkey-library-direction_id', 'library', 'direction_id', 'direction', 'id', 'RESTRICT', 'RESTRICT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%library}}', 'direction_id');
    }
}
