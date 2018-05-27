<?php

use yii\db\Migration;

/**
 * Class m180523_193516_update_user
 */
class m180523_193516_update_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    $this->addColumn('user', 'city', 'VARCHAR(255)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       // echo "m180523_193516_update_user cannot be reverted.\n";
        $this->dropColumn('user', 'city');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180523_193516_update_user cannot be reverted.\n";

        return false;
    }
    */
}
