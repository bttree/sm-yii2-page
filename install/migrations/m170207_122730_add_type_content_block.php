<?php

use yii\db\Migration;

class m170207_122730_add_type_content_block extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%page}}', 'type', $this->integer()->null());
    }

    public function safeDown()
    {
        $this->dropColumn('{{%page}}', 'type');
    }
}