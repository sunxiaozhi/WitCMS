<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%article_tag_relation}}".
 *
 * @property string $id id
 * @property string $article_id 文章id
 * @property string $tag_id 标签id
 */
class ArticleTagRelation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%article_tag_relation}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_id', 'tag_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'article_id' => Yii::t('backend', 'Article ID'),
            'tag_id' => Yii::t('backend', 'Tag ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleTag()
    {
        return $this->hasOne(ArticleTag::className(), ['id' => 'tag_id']);
    }
}
