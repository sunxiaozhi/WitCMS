<?php
/**
 * GridView的ActionColumn用于列表的查看、更新、删除等按钮
 * User: sunxiaozhi
 * Date: 2018/3/22 9:50
 */

namespace backend\grid;

use Yii;
use yii\helpers\Html;

class ActionColumn extends \yii\grid\ActionColumn
{
    public $template = '{view} {update} {auth} {accredit} {delete}';

    public function initDefaultButtons()
    {
        $this->initDefaultButton('view', 'eye-open', ['class' => 'btn btn-info btn-xs']);
        $this->initDefaultButton('update', 'pencil', ['class' => 'btn btn-primary btn-xs']);
        $this->initDefaultButton('change-password', 'key', ['class' => 'btn btn-primary btn-xs']);
        $this->initDefaultButton('auth', 'lock', ['class' => 'btn btn-success btn-xs']);
        $this->initDefaultButton('accredit', 'user', ['class' => 'btn btn-success btn-xs']);
        $this->initDefaultButton('delete', 'trash', [
            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
            'data-method' => 'post',
            'class' => 'btn btn-danger btn-xs'
        ]);
    }

    protected function initDefaultButton($name, $iconName, $additionalOptions = [])
    {
        if (!isset($this->buttons[$name]) && strpos($this->template, '{' . $name . '}') !== false) {
            $this->buttons[$name] = function ($url, $model, $key) use ($name, $iconName, $additionalOptions) {
                switch ($name) {
                    case 'view':
                        $title = Yii::t('yii', 'View');
                        break;
                    case 'update':
                        $title = Yii::t('yii', 'Update');
                        break;
                    case 'change-password':
                        $title = Yii::t('backend', 'Change Password');
                        break;
                    case 'delete':
                        $title = Yii::t('yii', 'Delete');
                        break;
                    case 'auth':
                        $title = Yii::t('backend', 'Auth');
                        break;
                    case 'accredit': //授权
                        $title = Yii::t('backend', 'Accredit');
                        break;
                    default:
                        $title = ucfirst($name);
                }
                $options = array_merge([
                    'title' => $title,
                    'aria-label' => $title,
                    'data-pjax' => '0',
                ], $additionalOptions, $this->buttonOptions);
                $icon = Html::tag('span', ' ' . $title, ['class' => "fa fa-$iconName"]);
                return Html::a($icon, $url, $options);
            };
        }
    }
}