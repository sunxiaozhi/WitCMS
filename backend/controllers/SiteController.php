<?php
namespace backend\controllers;

/**
 * Site controller
 */
class SiteController extends BaseController
{
    /**
     * 首页.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
