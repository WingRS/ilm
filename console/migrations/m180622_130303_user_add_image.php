<?php

use yii\db\Migration;

/**
 * Class m180622_130303_user_add_image
 */
class m180622_130303_user_add_image extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("user","avatar", "VARCHAR(255)");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        if($this->dropColumn("user","avatar")) {
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
        echo "m180622_130303_user_add_image cannot be reverted.\n";

        return false;
    }
    */
}
