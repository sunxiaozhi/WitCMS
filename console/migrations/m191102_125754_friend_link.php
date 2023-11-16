<?php

use yii\db\Migration;

/**
 * Class m191102_125754_friend_link
 */
class m191102_125754_friend_link extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB COMMENT="友情链接表"';
        }

        $this->createTable('{{%friend_link}}', [
            'id' => $this->primaryKey()->unsigned()->comment('id'),
            'name' => $this->string(255)->notNull()->defaultValue('')->comment('友情链接名字'),
            'image' => $this->string(255)->notNull()->defaultValue('')->comment('友情链接图片'),
            'url' => $this->string(255)->notNull()->defaultValue('')->comment('友情链接网址'),
            'target' => $this->string(20)->notNull()->defaultValue('_blank')->comment('跳转方式'),
            'sort' => $this->integer(11)->notNull()->defaultValue(0)->comment('排序'),
            'status' => $this->tinyInteger(1)->notNull()->defaultValue(0)->comment('状态 0隐藏 1显示'),
            'created_at' => $this->integer(11)->unsigned()->notNull()->defaultValue(0)->comment('添加时间'),
            'updated_at' => $this->integer(11)->unsigned()->notNull()->defaultValue(0)->comment('修改时间'),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%friend_link}}');
    }
}
