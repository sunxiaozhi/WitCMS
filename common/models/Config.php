<?php

namespace common\models;

use Yii;
use common\helpers\DependencyFileHelper;

/**
 * This is the model class for table "{{%config}}".
 *
 * @property string $id 配置ID
 * @property string $name 配置名称
 * @property string $title 配置说明
 * @property int $group 配置分组
 * @property int $type 配置类型
 * @property string $value 配置值
 * @property string $extra 配置值
 * @property string $remark 配置说明
 * @property int $sort 排序
 * @property int $status 状态
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class Config extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%config}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group', 'type'], 'safe'],
            [['sort', 'status', 'created_at', 'updated_at'], 'integer'],
            [['value'], 'string'],
            [['name'], 'string', 'max' => 30],
            [['title'], 'string', 'max' => 50],
            [['extra'], 'string', 'max' => 255],
            [['remark'], 'string', 'max' => 100],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', '配置ID'),
            'name' => Yii::t('backend', '配置名称'),
            'title' => Yii::t('backend', '配置说明'),
            'group' => Yii::t('backend', '配置分组'),
            'type' => Yii::t('backend', '配置类型'),
            'value' => Yii::t('backend', '配置值'),
            'extra' => Yii::t('backend', '配置值'),
            'remark' => Yii::t('backend', '配置说明'),
            'sort' => Yii::t('backend', '排序'),
            'status' => Yii::t('backend', '状态'),
            'created_at' => Yii::t('backend', '创建时间'),
            'updated_at' => Yii::t('backend', '更新时间'),
        ];
    }

    /**
     * @param bool $insert
     * @param array $changedAttributes
     * @throws \yii\base\InvalidConfigException
     *
     * @var $dependencyFileHelper \common\helpers\DependencyFileHelper
     */
    public function afterSave($insert, $changedAttributes)
    {
        //更新缓存依赖文件
        $dependencyFileHelper = Yii::createObject([
                'class' => DependencyFileHelper::className(),
                'dependencyFileName' => 'configs.txt',
            ]
        );

        $dependencyFileHelper->updateDependencyFile();

        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }
}
