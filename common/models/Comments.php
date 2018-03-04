<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%comments}}".
 *
 * @property string $id id
 * @property string $article_id 文章id
 * @property string $user_id 用户id
 * @property string $parent_id 父级id
 * @property string $content 评论内容
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'user_id', 'parent_id'], 'integer'],
            [['content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('database', 'ID'),
            'article_id' => Yii::t('database', 'Article ID'),
            'user_id' => Yii::t('database', 'User ID'),
            'parent_id' => Yii::t('database', 'Parent ID'),
            'content' => Yii::t('database', 'Content'),
        ];
    }
}
