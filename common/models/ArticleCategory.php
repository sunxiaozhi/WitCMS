<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%article_category}}".
 *
 * @property string $id ID
 * @property string $parent_id 父类id
 * @property string $name 名称
 * @property string $alias 别名
 * @property string $sort 排序
 * @property string $remark 备注
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class ArticleCategory extends ArticleBase
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%article_category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'sort', 'created_at', 'updated_at'], 'integer'],
            [['name', 'alias'], 'required'],
            [['name', 'alias', 'remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('database', 'ID'),
            'parent_id' => Yii::t('database', 'Parent Category'),
            'name' => Yii::t('database', 'Name'),
            'alias' => Yii::t('database', 'Alias'),
            'sort' => Yii::t('database', 'Sort'),
            'remark' => Yii::t('database', 'Remark'),
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
