<?php

use yii\db\Migration;

/**
 * Class m191224_152620_change_admin_role
 */
class m191224_152620_change_admin_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('UPDATE {{%auth_assignments}} SET item_name=\'admin\' WHERE user_id=1');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
