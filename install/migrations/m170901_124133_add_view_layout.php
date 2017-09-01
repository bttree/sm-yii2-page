<?php

use yii\db\Migration;

class m170901_124133_add_view_layout extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%page}}', 'view', $this->string()->null());
        $this->addColumn('{{%page}}', 'layout', $this->string()->null());
    }

    public function safeDown()
    {
        $this->dropColumn('{{%page}}', 'view');
        $this->dropColumn('{{%page}}', 'layout');
    }
}