<?php

use yii\db\Migration;

/**
 * Handles the creation of table `invitation_model`.
 */
class m180624_175830_create_invitation_model_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('invitation_model', [
            'id' => $this->primaryKey(),
            'email' => $this->string(),
            'invite_string' => $this->string(),
            'created_at' => $this->timestamp(),
            'is_active' =>  $this->boolean()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('invitation_model');
    }
}
