<?php
/**
 * 前台菜单部件
 * User: sunhuanzhi
 * Date: 2018/3/22
 * Time: 9:50
 */

namespace frontend\widgets;

use yii;
use yii\helpers\Url;
use common\models\Menu;

class MenuView extends \yii\base\Widget
{
    public $template = "<ul class=\"nav top-2\">{lis}<!--<li><a class=\"search\"><i class=\"icon-search search-btn\"></i></a></li>--></ul>";

    public $liTemplate_have_sub = "<li class='{current_menu_class}'><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">{menu_name}<b class=\"caret\"></b></a>{sub_menu}<b class=\"caret-out\"></b></li>";

    public $liTemplate_no_sub = "<li class='{current_menu_class}'><a href=\"{url}\">{menu_name}</a></li>";

    public $subTemplate = "<ul class=\"dropdown-menu\">{lis}</ul>";

    public $subLitemplate = "<li><a href=\"{url}\">{sub_menu_name}</a></li>";

    /**
     * @inheritdoc
     */
    public function run()
    {
        parent::run();
        static $menus = null;
        if ($menus === null) {
            $menus = Menu::find()
                ->where(['type' => Menu::FRONTEND_MENU_TYPE, 'status' => Menu::DISPLAY_YES])
                ->orderBy("sort asc,parent_id asc")
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
                    ], [
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
     * @return mixed|string
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
                        $urlTo = [];

                        //article/index?cid=1&t=2
                        $urlArr = explode('?', $menu['route']);

                        if (is_array($urlArr)) {
                            $link = array_shift($urlArr);

                            if (!empty($urlArr)) {
                                $parameterArr = explode('&', $urlArr[0]);
                                foreach ($parameterArr as $k => $v) {
                                    $urlTo[substr($v,0,strrpos($v,'='))] = substr($v,strripos($v,"=")+1);
                                }
                            }

                            array_unshift($urlTo, $link);
                        }

                        $url = Url::to($urlTo);
                    }
                }
                $current_menu_class = '';

                if ($menu['route'] == Yii::$app->controller->id . '/' . Yii::$app->controller->action->id) {
                    $current_menu_class = 'active';
                    $menu_open = 'active menu_open';
                } elseif ($menu['route'] == Yii::$app->controller->id . '/index') {
                    $current_menu_class = 'active';
                    $menu_open = 'active menu_open';
                } else {
                    if (yii::$app->request->getPathInfo() == $menu['route']) {
                        $current_menu_class = 'active';
                        $menu_open = 'active menu_open';
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