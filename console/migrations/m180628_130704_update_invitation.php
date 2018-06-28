<?php

use yii\db\Migration;

/**
 * Class m180628_130704_update_invitation
 */
class m180628_130704_update_invitation extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn("invitation_model", "created_at", "INT(64)");
        $this->addColumn("invitation_model", "used_at", "INT(64)");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn("invitation_model", "created_at");
        $this->dropColumn("invitation_model", "used_at");
        return false;
    }


}
