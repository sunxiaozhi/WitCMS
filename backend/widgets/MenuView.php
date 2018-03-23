<?php

namespace backend\widgets;
use yii;
use yii\helpers\Url;
use Common\models\Menu;

class MenuView extends \yii\base\Widget
{

    public $template = "<ul class=\"sidebar-menu\" data-widget=\"tree\">{lis}</ul>";

    public $liTemplate = "<li class=\"treeview\"><a href=\"#\"><i class=\"fa fa-dashboard\"></i> <span>{menu_name}</span><span class=\"pull-right-container\"><i class=\"fa fa-angle-left pull-right\"></i></span></a>{sub_menu}</li>";

    public $subTemplate = "<ul class=\"treeview-menu\">{lis}</ul>";

    public $subLitemplate = "<li class=\"{current_menu_class}\"><a href=\"{route}\">{sub_menu_name}</a></li>";

    /**
     * @inheritdoc
     */
    public function run()
    {
        parent::run();
        static $menus = null;
        if( $menus === null ) {
            $menus = Menu::find()
                ->where(['type' => Menu::BACKEND_MENU_TYPE, 'status' => Menu::DISPLAY_YES])
                ->orderBy("sort asc,parent_id asc")
                ->asArray()
                ->all();
        }
        $content = '';
        foreach ($menus as $key => $menu) {
            if ($menu['parent_id'] == 0) {
                if (empty($menu['url'])) {
                    $url = '#';
                } else {
                    if ($menu['is_absolute_url']) {
                        $url = $menu['url'];
                    } else {
                        $url = Url::to([$menu['url']]);
                    }
                }
                $current_menu_class = '';
                if ($url == yii::$app->getRequest()->getUrl()) {
                    $current_menu_class = ' active ';
                }
                $submenu = $this->getSubMenu($menus, $menu['id']);
                $content .= str_replace([
                    '{menu_id}',
                    '{current_menu_class}',
                    '{url}',
                    '{target}',
                    '{menu_name}',
                    '{sub_menu}'
                ], [
                    $menu['id'],
                    $current_menu_class,
                    $url,
                    //$menu['target'],
                    '',
                    $menu['name'],
                    $submenu
                ], $this->liTemplate);
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
        foreach ($menus as $key => $menu) {
            if ($menu['parent_id'] == $cur_id) {
                if (empty($menu['route'])) {
                    $url = '#';
                } else {
                    //if ($menu['is_absolute_url']) {
                    if (false) {
                        $url = $menu['route'];
                    } else {
                        $url = Url::to([$menu['route']]);
                    }
                }
                $current_menu_class = '';
                if ($menu['route'] == Yii::$app->controller->id . '/' . Yii::$app->controller->action->id) {
                    $current_menu_class = ' active ';
                } else {
                    if (yii::$app->request->getPathInfo() == $menu['route']) {
                        $current_menu_class = ' active ';
                    }
                }
                $content .= str_replace([
                    '{menu_id}',
                    '{current_menu_class}',
                    '{route}',
                    '{target}',
                    '{sub_menu_name}'
                ], [$menu['id'], $current_menu_class, $url, '', $menu['name']], $this->subLitemplate);
            }
        }
        if ($content != '') {
            return str_replace('{lis}', $content, $this->subTemplate);
        } else {
            return '';
        }
    }
}