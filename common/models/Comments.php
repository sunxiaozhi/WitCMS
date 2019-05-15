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
 * @property int $status 评论的状态 0未审 1通过 2未通过
 * @property string $content 评论内容
 * @property int $created_at 创建时间
 */
class Comments extends ArticleBase
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
            [['article_id', 'user_id', 'parent_id', 'created_at'], 'integer'],
            [['content'], 'string'],
            [['created_at'], 'required'],
            [['status'], 'string', 'max' => 2],
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
            'status' => Yii::t('database', 'Status'),
            'content' => Yii::t('database', 'Content'),
            'created_at' => Yii::t('database', 'Created At'),
        ];
    }
}
