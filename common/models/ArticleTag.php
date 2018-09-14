<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%article_tag}}".
 *
 * @property string $id ID
 * @property string $name 名称
 * @property string $alias 别名
 * @property string $sort 排序
 * @property string $remark 备注
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class ArticleTag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%article_tag}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'alias'], 'required'],
            [['sort', 'created_at', 'updated_at'], 'integer'],
            [['name', 'alias', 'remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'name' => Yii::t('backend', '名称'),
            'alias' => Yii::t('backend', '别名'),
            'sort' => Yii::t('backend', '排序'),
            'remark' => Yii::t('backend', '备注'),
            'created_at' => Yii::t('backend', '创建时间'),
            'updated_at' => Yii::t('backend', '更新时间'),
        ];
    }
}
