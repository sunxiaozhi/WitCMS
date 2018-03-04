<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property string $id 文章id
 * @property string $title 标题
 * @property string $sub_title 副标题
 * @property string $abstract 摘要
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
            [['created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('database', 'ID'),
            'title' => Yii::t('database', 'Title'),
            'sub_title' => Yii::t('database', 'Sub Title'),
            'abstract' => Yii::t('database', 'Abstract'),
            'sort' => Yii::t('database', 'Sort'),
            'status' => Yii::t('database', 'Status'),
            'created_at' => Yii::t('database', 'Created At'),
            'updated_at' => Yii::t('database', 'Updated At'),
        ];
    }
}
