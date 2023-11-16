<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

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
    const BACKEND_MENU_TYPE = 0;  //后台菜单
    const FRONTEND_MENU_TYPE = 1;  //前台菜单

    const DISPLAY_NO = 0;  //不显示
    const DISPLAY_YES = 1;  //显示

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    /*
     * 通过行为自动使时间创建和更新
     * */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'route'], 'required'],
            [['parent_id', 'type', 'sort', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'route', 'icon'], 'string', 'max' => 255],
            ['status', 'default', 'value' => '1']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('database', 'ID'),
            'name' => Yii::t('database', 'Name'),
            'parent_id' => Yii::t('database', 'Parent Menu'),
            'route' => Yii::t('database', 'Route'),
            'icon' => Yii::t('database', 'Icon'),
            'type' => Yii::t('database', 'Type'),
            'sort' => Yii::t('database', 'Sort'),
            'status' => Yii::t('database', 'Status'),
            'created_at' => Yii::t('database', 'Created At'),
            'updated_at' => Yii::t('database', 'Updated At'),
        ];
    }

    /**
     * ---------------------------------------
     * 栏目权限检测
     * @param string $rule 检测的规则
     * @return boolean
     * ---------------------------------------
     */
    public static function checkRule($rule)
    {
        /* rbac */
        if (!\Yii::$app->user->can($rule)) {
            return false;
        }

        return true;
    }

    /**
     * 获取全部菜单
     * @param int $type
     * @return \yii\db\ActiveQuery
     */
    public static function getMenuData($type = self::BACKEND_MENU_TYPE)
    {
        return self::find()->where(['type' => $type]);
    }

    /**
     * 按等级生成菜单
     * @param $type
     * @return \yii\db\ActiveQuery
     */
    public static function getMenus($type)
    {
        return self::getMenuData($type);
    }
}
