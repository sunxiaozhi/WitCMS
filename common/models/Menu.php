<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property string $id 菜单id
 * @property string $name 菜单名称
 * @property string $parent_id 父id
 * @property string $route 路由
 * @property string $icon 图标样式
 * @property int $type 菜单类型 0 后台菜单 1前台菜单
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'route'], 'required'],
            [['parent_id', 'type', 'created_at', 'updated_at'], 'integer'],
            [['name', 'route', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'name' => Yii::t('backend', 'Name'),
            'parent_id' => Yii::t('backend', 'Parent ID'),
            'route' => Yii::t('backend', 'Route'),
            'icon' => Yii::t('backend', 'Icon'),
            'type' => Yii::t('backend', 'Type'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
        ];
    }
}
