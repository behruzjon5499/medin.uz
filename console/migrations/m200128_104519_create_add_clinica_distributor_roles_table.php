<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%add_clinica_distributor_roles}}`.
 */
class m200128_104519_create_add_clinica_distributor_roles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%auth_items}}', ['type', 'name', 'description'], [
            [1, 'clinic', 'Role for Clinics'],
            [1, 'distributor', 'Role for Distributors'],
        ]);

        $this->batchInsert('{{%auth_item_children}}', ['parent', 'child'], [
            ['admin', 'clinic'],
            ['admin', 'distributor'],
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->delete('{{%auth_items}}', ['name' => ['clinic', 'distributor']]);
    }
}
