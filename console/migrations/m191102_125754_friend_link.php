<?php

use yii\db\Migration;

/**
 * Class m191102_125754_friend_link
 */
class m191102_125754_friend_link extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191102_125754_friend_link cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191102_125754_friend_link cannot be reverted.\n";

        return false;
    }
    */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB COMMENT="友情链接表"';
        }

        $this->createTable('{{%friend_link}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()->comment('友情链接名字'),
            'image' => $this->string(100)->comment('友情链接图片'),
            'url' => $this->string(100)->comment('友情链接网址'),
            'target' => $this->string(100)->defaultValue('_blank')->comment('跳转方式'),
            'sort' => $this->integer()->defaultValue(0)->comment('排序'),
            'status' => $this->integer()->defaultValue(0)->comment('状态'),
            'created_at' => $this->integer()->comment('添加时间'),
            'updated_at' => $this->integer()->comment('修改时间'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%friend_link}}');
    }
}
