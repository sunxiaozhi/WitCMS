<?php

use yii\db\Migration;

/**
 * Class m191107_083007_article_category
 */
class m191107_083007_article_category extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB COMMENT="文章分类表"';
        }

        $this->createTable('{{%article_category}}', [
            'id' => $this->primaryKey()->unsigned()->comment('id'),
            'parent_id' => $this->integer(11)->unsigned()->notNull()->defaultValue(0)->comment('父类id'),
            'name' => $this->string(255)->notNull()->defaultValue('')->comment('文章分类名称'),
            'alias' => $this->string(255)->notNull()->defaultValue('')->comment('文章分类别名'),
            'sort' => $this->integer(11)->notNull()->defaultValue(0)->comment('排序'),
            'remark' => $this->string(255)->notNull()->defaultValue('')->comment('备注'),
            'created_at' => $this->integer(11)->unsigned()->notNull()->defaultValue(0)->comment('添加时间'),
            'updated_at' => $this->integer(11)->unsigned()->notNull()->defaultValue(0)->comment('修改时间'),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%article_category}}');
    }
}
