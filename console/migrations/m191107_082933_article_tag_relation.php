<?php

use yii\db\Migration;

/**
 * Class m191107_082933_article_tag_relation
 */
class m191107_082933_article_tag_relation extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB COMMENT="文章标签映射表"';
        }

        $this->createTable('{{%article_tag_relation}}', [
            'id' => $this->primaryKey()->unsigned()->comment('id'),
            'article_id' => $this->integer(11)->unsigned()->notNull()->defaultValue(0)->comment('文章id'),
            'tag_id' => $this->integer(11)->unsigned()->notNull()->defaultValue(0)->comment('标签id'),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%article_tag_relation}}');
    }
}
