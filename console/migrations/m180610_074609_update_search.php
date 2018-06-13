<?php

use yii\db\Migration;

/**
 * Class m180610_074609_update_search
 */
class m180610_074609_update_search extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("search_quaries","region","VARCHAR(255)");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180610_074609_update_search cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180610_074609_update_search cannot be reverted.\n";

        return false;
    }
    */
}
