<?php
/**
 * GridView的ActionColumn用于列表的查看、更新、删除等按钮
 *
 * User: sunhuanzhi
 * Date: 2018/3/22
 * Time: 9:50
 */

namespace backend\grid;

use Yii;
use yii\helpers\Html;

class ActionColumn extends \yii\grid\ActionColumn
{

    public $template = '{view} {update} {auth} {delete}';

    public function initDefaultButtons()
    {
        $this->initDefaultButton('view', 'eye-open',['class' => 'btn btn-info btn-xs']);
        $this->initDefaultButton('update', 'pencil',['class' => 'btn btn-primary btn-xs']);
        $this->initDefaultButton('auth', 'lock',['class' => 'btn btn-success btn-xs']);
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
                    case 'delete':
                        $title = Yii::t('yii', 'Delete');
                        break;
                    case 'auth':
                        $title = Yii::t('yii', 'Auth');
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

    /*protected function initDefaultButtons()
    {
        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'View'),
                    'aria-label' => Yii::t('yii', 'View'),
                    'data-pjax' => '0',
                    'class' => 'btn btn-info btn-xs',
                ], $this->buttonOptions);
                return Html::a('<span class="fa fa-eye"></span> ' . Yii::t('yii', 'View'), $url, $options);
            };
        }
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'Update'),
                    'aria-label' => Yii::t('yii', 'Update'),
                    'data-pjax' => '0',
                    'class' => 'btn btn-primary btn-xs',
                ], $this->buttonOptions);
                return Html::a('<span class="fa fa-edit"></span> ' . Yii::t('yii', 'Update'), $url, $options);
            };
        }
        if (!isset($this->buttons['auth'])) {
            $this->buttons['auth'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('backend', 'Auth'),
                    'aria-label' => Yii::t('backend', 'Auth'),
                    'data-pjax' => '0',
                    'class' => 'btn btn-success btn-xs',
                ], $this->buttonOptions);
                return Html::a('<span class="fa fa-user"></span> ' . Yii::t('backend', 'Auth'), $url, $options);
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'Delete'),
                    'aria-label' => Yii::t('yii', 'Delete'),
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                    'class' => 'btn btn-danger btn-xs',
                ], $this->buttonOptions);
                return Html::a('<span class="fa fa-times"></span> ' . Yii::t('yii', 'Delete'), $url, $options);
            };
        }
    }*/

}