<?php

use yii\db\Migration;

/**
 * Class m180624_182843_update_invitation_table
 */
class m180624_182843_update_invitation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("invitation_model","used_at", "TIMESTAMP");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180624_182843_update_invitation_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180624_182843_update_invitation_table cannot be reverted.\n";

        return false;
    }
    */
}
