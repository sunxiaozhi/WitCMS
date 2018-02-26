<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%friend_link}}".
 *
 * @property string $id 友情链接id
 * @property string $name 友情链接名字
 * @property string $image 友情链接图片
 * @property string $url 友情链接网址
 * @property string $target 跳转方式
 * @property string $sort 排序
 * @property int $status 状态
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class FriendLink extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%friend_link}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['sort', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'image', 'url', 'target'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', '友情链接id'),
            'name' => Yii::t('backend', '友情链接名字'),
            'image' => Yii::t('backend', '友情链接图片'),
            'url' => Yii::t('backend', '友情链接网址'),
            'target' => Yii::t('backend', '跳转方式'),
            'sort' => Yii::t('backend', '排序'),
            'status' => Yii::t('backend', '状态'),
            'created_at' => Yii::t('backend', '创建时间'),
            'updated_at' => Yii::t('backend', '更新时间'),
        ];
    }
}
