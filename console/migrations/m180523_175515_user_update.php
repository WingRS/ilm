<?php

use yii\db\Migration;

/**
 * Class m180523_175515_user_update
 */
class m180523_175515_user_update extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user','name','VARCHAR(255) NOT NULL');
        $this->addColumn('user','surname','VARCHAR(255) NOT NULL');
        $this->addColumn('user','chair','VARCHAR(255) NOT NULL');
        $this->addColumn('user','company','VARCHAR(255) NOT NULL');
        $this->addColumn('user','facebook','VARCHAR(255)');
        $this->addColumn('user','linkedin','VARCHAR(255)');
        $this->addColumn('user','phone','VARCHAR(255)');
        $this->addColumn('user','bio','TEXT');
        $this->addColumn('user','ilm_program','string not null');
        $this->addColumn('user','ilm_year','int');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user','name');
        $this->dropColumn('user','surname');
        $this->dropColumn('user','chair');
        $this->dropColumn('user','company');
        $this->dropColumn('user','facebook');
        $this->dropColumn('user','linkedin');
        $this->dropColumn('user','phone');
        $this->dropColumn('user','bio');
        $this->dropColumn('user','ilm_program');
        $this->dropColumn('user','ilm_year');

        echo "m180523_175515_user_update cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180523_175515_user_update cannot be reverted.\n";

        return false;
    }
    */
}
