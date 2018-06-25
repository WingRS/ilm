<?php

use yii\db\Migration;

/**
 * Handles the creation of table `programs`.
 */
class m180622_132038_create_programs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('programs', [
            'id' => $this->primaryKey(),
            "program_name" => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('programs');
    }
}
