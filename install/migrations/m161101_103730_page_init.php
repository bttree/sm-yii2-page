<?php

use yii\db\Migration;

class m161101_103730_page_init extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%page_category}}',
                           [
                               'id'              => $this->primaryKey(),
                               'name'            => $this->string()->notNull(),
                               'slug'            => $this->string()->notNull(),
                               'parent_id'       => $this->integer()->null(),
                               'status'          => $this->integer()->notNull(),
                               'description'     => $this->text()->null(),
                               'seo_title'       => $this->string()->null(),
                               'seo_keywords'    => $this->text()->null(),
                               'seo_description' => $this->text()->null(),
                           ],
                           $tableOptions);
        $pageColumns = [
            'id'                => $this->primaryKey(),
            'name'              => $this->string()->notNull(),
            'slug'              => $this->string()->notNull(),
            'category_id'       => $this->integer()->null(),
            'status'            => $this->integer()->notNull(),
            'short_description' => $this->text()->null(),
            'full_description'  => $this->text()->null(),
            'create_time'       => $this->timestamp()
                                        ->defaultExpression('CURRENT_TIMESTAMP')
                                        ->notNull(),
            'seo_title'         => $this->string()->null(),
            'seo_keywords'      => $this->text()->null(),
            'seo_description'   => $this->text()->null(),
        ];
        if ($this->db->getDriverName() === 'mysql') {
            $pageColumns['update_time'] = $this->timestamp()
                                               ->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')
                                               ->notNull();
        } elseif($this->db->driverName === 'pgsql') {
            $pageColumns['update_time'] = $this->timestamp()
                                               ->defaultExpression('CURRENT_TIMESTAMP')
                                               ->notNull();
        }

        $this->createTable('{{%page}}',
                           $pageColumns,
                           $tableOptions);

        if($this->db->driverName === 'pgsql') {
            $this->execute('CREATE FUNCTION update_update_time_column() RETURNS trigger
                                LANGUAGE plpgsql
                                AS $$
                              BEGIN
                                NEW.update_time = NOW();
                                RETURN NEW;
                              END;
                            $$;');
            $this->execute("CREATE TRIGGER page_update_time_modtime BEFORE UPDATE ON page FOR EACH ROW                                                       EXECUTE PROCEDURE update_update_time_column();");
        }

        $this->addForeignKey('page_page_category',
                             '{{%page}}',
                             'category_id',
                             '{{%page_category}}',
                             'id',
                             'CASCADE',
                             'RESTRICT');
    }

    public function safeDown()
    {
        $this->dropForeignKey('{{%page}}', 'page_page_category');

        $this->dropTable('{{%page_category}}');
        $this->dropTable('{{%page}}');
    }
}