<?php
/**
 * 后台菜单部件.
 *
 * User: sunhuanzhi
 * Date: 2018/3/22
 * Time: 9:50
 */

namespace backend\widgets;

use yii;
use yii\helpers\Url;
use common\models\Menu;

class MenuView extends \yii\base\Widget
{
    public $template = "<ul class=\"sidebar-menu\" data-widget=\"tree\">{lis}</ul>";

    public $liTemplate_have_sub = "<li class=\"treeview {current_menu_class}\"><a href=\"#\"><i class=\"{icon}\"></i> <span>{menu_name}</span><span class=\"pull-right-container\"><i class=\"fa fa-angle-left pull-right\"></i></span></a>{sub_menu}</li>";

    public $liTemplate_no_sub = "<li class='{current_menu_class}'><a href=\"{url}\"><i class=\"{icon}\"></i> <span>{menu_name}</span></a></li>";

    public $subTemplate = "<ul class=\"treeview-menu\">{lis}</ul>";

    public $subLitemplate = "<li class=\"{current_menu_class}\"><a href=\"{url}\"><i class=\"{icon}\"></i>{sub_menu_name}</a></li>";

    /**
     * @inheritdoc
     */
    public function run()
    {
        parent::run();
        static $menus = null;
        if ($menus === null) {
            $menus = Menu::find()
                ->where(['type' => Menu::BACKEND_MENU_TYPE, 'status' => Menu::DISPLAY_YES])
                ->orderBy("sort desc,parent_id asc")
                ->asArray()
                ->all();
        }
        $content = '';
        foreach ($menus as $key => $menu) {
            if ($menu['parent_id'] == 0) {
                if (empty($menu['route'])) {
                    $url = '#';
                } else {
                    if ($menu['is_absolute_url']) {
                        $url = $menu['route'];
                    } else {
                        $url = Url::to([$menu['route']]);
                    }
                }

                $submenu = $this->getSubMenu($menus, $menu['id']);

                if ($submenu['sub_menu'] != '') {
                    $current_menu_class = '';

                    if ($submenu['menu-open'] != '') {
                        $current_menu_class = $submenu['menu-open'];
                    }

                    if ($url == yii::$app->getRequest()->getUrl()) {
                        $current_menu_class = ' active ';
                    }

                    $content .= str_replace([
                        '{current_menu_class}',
                        '{icon}',
                        '{menu_name}',
                        '{sub_menu}'
                    ], [
                        $current_menu_class,
                        $menu['icon'],
                        $menu['name'],
                        $submenu['sub_menu']
                    ], $this->liTemplate_have_sub);
                } else {
                    $current_menu_class = '';
                    if ($menu['route'] == Yii::$app->controller->id . '/' . Yii::$app->controller->action->id) {
                        $current_menu_class = ' active ';
                    } elseif ($menu['route'] == Yii::$app->controller->id . '/index') {
                        $current_menu_class = ' active ';
                    } else {
                        if (yii::$app->request->getPathInfo() == $menu['route']) {
                            $current_menu_class = ' active ';
                        }
                    }

                    $content .= str_replace([
                        '{current_menu_class}',
                        '{url}',
                        '{icon}',
                        '{menu_name}'
                    ],[
                        $current_menu_class,
                        $url,
                        $menu['icon'],
                        $menu['name']
                    ], $this->liTemplate_no_sub);
                }
            }
        }
        return str_replace('{lis}', $content, $this->template);
    }

    /**
     * @param $menus
     * @param $cur_id
     * @return array
     * @throws yii\base\InvalidConfigException
     */
    private function getSubMenu($menus, $cur_id)
    {
        $content = '';
        $menu_open = '';
        foreach ($menus as $key => $menu) {
            if ($menu['parent_id'] == $cur_id) {
                if (empty($menu['route'])) {
                    $url = '#';
                } else {
                    if ($menu['is_absolute_url']) {
                        $url = $menu['route'];
                    } else {
                        $url = Url::to([$menu['route']]);
                    }
                }
                $current_menu_class = '';

                if ($menu['route'] == Yii::$app->controller->id . '/' . Yii::$app->controller->action->id) {
                    $current_menu_class = ' active ';
                    $menu_open = ' active menu_open ';
                } elseif ($menu['route'] == Yii::$app->controller->id . '/index') {
                    $current_menu_class = ' active ';
                    $menu_open = ' active menu_open ';
                } else {
                    if (yii::$app->request->getPathInfo() == $menu['route']) {
                        $current_menu_class = ' active ';
                        $menu_open = ' active menu_open ';
                    }
                }

                //(substr($menu['route'],0,strrpos($menu['route'],'/')) . '/index')  == Yii::$app->controller->id . '/' . Yii::$app->controller->action->id

                $content .= str_replace([
                    '{current_menu_class}',
                    '{url}',
                    '{icon}',
                    '{sub_menu_name}'
                ], [$current_menu_class, $url, $menu['icon'], $menu['name']], $this->subLitemplate);
            }
        }

        if ($content != '') {
            $sub_menu = str_replace('{lis}', $content, $this->subTemplate);
        } else {
            $sub_menu = '';
        }

        $return = [
            'sub_menu' => $sub_menu,
            'menu-open' => $menu_open
        ];

        return $return;
    }
}