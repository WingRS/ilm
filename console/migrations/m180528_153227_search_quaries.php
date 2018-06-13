<?php

use yii\db\Migration;

/**
 * Class m180528_153227_search_quaries
 */
class m180528_153227_search_quaries extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%search_quaries}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'quary' => $this->string()->notNull(),
            'user_id' => $this->integer()->notNull()],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable("search_quaries");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180528_153227_search_quaries cannot be reverted.\n";

        return false;
    }
    */
}
