<?php

use yii\db\Migration;

class m161101_154215_add_page_image extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%page}}', 'image', $this->string()->notNull());
    }

    public function safeDown()
    {
        $this->dropColumn('{{%page}}', 'image');
    }
}