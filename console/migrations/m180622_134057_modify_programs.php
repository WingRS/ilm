<?php

use yii\db\Migration;

/**
 * Class m180622_134057_modify_programs
 */
class m180622_134057_modify_programs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("programs", "is_active","INT(5)");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        if($this->dropColumn("programs", "is_active")) {
            return true;
        }

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180622_134057_modify_programs cannot be reverted.\n";

        return false;
    }
    */
}
