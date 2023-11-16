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
 * @property string $Thumb 缩略图
 * @property string $content 文章内容
 * @property string $sort 排序
 * @property string $status 状态
 * @property int $page_views 浏览量
 * @property string $type 类型
 * @property string $is_recommend 类型
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class Article extends ArticleBase
{
    const STATUS_YES = 1;
    const STATUS_NO = 0;

    const ARTICLE = 0;
    const PAGE = 1;

    const RECOMMEND_YES = 1;
    const RECOMMEND_NO = 0;

    public $tag;

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
            [['title', 'category_id'], 'required'],
            [['title', 'sub_title', 'abstract'], 'string', 'max' => 255],
            [['content', 'seo_title', 'seo_keywords', 'seo_description',], 'string'],
            [['sort', 'status', 'type', 'is_recommend'], 'integer'],
            [['thumb'], 'string'],
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
            'tag' => Yii::t('database', 'Tag'),
            'title' => Yii::t('database', 'Title'),
            'sub_title' => Yii::t('database', 'Sub Title'),
            'abstract' => Yii::t('database', 'Abstract'),
            'thumb' => Yii::t('database', 'Thumb'),
            'content' => Yii::t('database', 'ArticleContent'),
            'sort' => Yii::t('database', 'Sort'),
            'status' => Yii::t('database', 'Status'),
            'type' => Yii::t('database', 'Type'),
            'is_recommend' => Yii::t('database', 'Is_Recommend'),
            'seo_title' => Yii::t('database', 'Seo_Title'),
            'seo_keywords' => Yii::t('database', 'Seo_Keywords'),
            'seo_description' => Yii::t('database', 'Seo_Description'),
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

    /**
     * 获取文章分类
     * @return \yii\db\ActiveQuery
     */
    public function getArticleCategory()
    {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'category_id']);
    }

    /**
     * 获取文章标签
     * @return \yii\db\ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getArticleTag()
    {
        return $this->hasMany(ArticleTag::className(), ['id' => 'tag_id'])->viaTable(ArticleTagRelation::tableName(), ['article_id' => 'id']);
    }
}
