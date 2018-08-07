<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property string $id 文章id
 * @property string $category_id 文章分类id
 * @property string $title 标题
 * @property string $sub_title 副标题
 * @property string $abstract 摘要
 * @property string $content 文章内容
 * @property string $sort 排序
 * @property string $status 状态
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['created_at', 'updated_at'], 'required'],
            //[['created_at', 'updated_at'], 'integer'],
            [['title','category_id'], 'required'],
            [['title', 'sub_title', 'abstract'], 'string', 'max' => 255],
            [['content', 'seo_title', 'seo_keywords', 'seo_description',], 'string'],
            [['sort', 'status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('database', 'ID'),
            'category_id' => Yii::t('database', 'Category Id'),
            'title' => Yii::t('database', 'Title'),
            'sub_title' => Yii::t('database', 'Sub Title'),
            'abstract' => Yii::t('database', 'Abstract'),
            'content' => Yii::t('database', 'ArticleContent'),
            'sort' => Yii::t('database', 'Sort'),
            'status' => Yii::t('database', 'Status'),
            'seo_title' => Yii::t('database', 'seo_title'),
            'seo_keywords' => Yii::t('database', 'seo_keywords'),
            'seo_description' => Yii::t('database', 'seo_description'),
            'created_at' => Yii::t('database', 'Created At'),
            'updated_at' => Yii::t('database', 'Updated At'),
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => time(),
            ],
        ];
    }
}
