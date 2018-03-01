<?php
/**
 * Created by PhpStorm.
 *
 * User: sunhuanzhi
 * Date: 2018/3/1
 * Time: 16:39
 */

namespace backend\components;

use Yii;
use yii\web\User;

class Helper
{
    /**
     * Check access route for user.
     * @param string|array $route
     * @param integer|User $user
     * @return boolean
     */
    public static function checkRoute($route, $params = [], $user = null)
    {
        $r = static::normalizeRoute($route);

        if ($user === null) {
            $user = Yii::$app->getUser();
        }
        $userId = $user instanceof User ? $user->getId() : $user;


        if ($user->can($r, $params)) {
            return true;
        }
        while (($pos = strrpos($r, '/')) > 0) {
            $r = substr($r, 0, $pos);
            if ($user->can($r . '/*', $params)) {
                return true;
            }
        }
        return $user->can('/*', $params);

    }

    protected static function normalizeRoute($route)
    {
        if ($route === '') {
            return '/' . Yii::$app->controller->getRoute() . ':' . yii::$app->getRequest()->getMethod();
        } elseif (strncmp($route, '/', 1) === 0) {
            return $route . ':' . yii::$app->getRequest()->getMethod();
        } elseif (strpos($route, '/') === false) {
            return '/' . Yii::$app->controller->getUniqueId() . '/' . $route . ':' . yii::$app->getRequest()->getMethod();
        } elseif (($mid = Yii::$app->controller->module->getUniqueId()) !== '') {
            return '/' . $mid . '/' . $route . ':' . yii::$app->getRequest()->getMethod();
        }
        return '/' . $route . ':' . yii::$app->getRequest()->getMethod();
    }

}