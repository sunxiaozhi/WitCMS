<?php
/**
 * 文章控制器
 * User: sunxiaozhi
 * Date: 2019/5/31 10:50
 */

namespace api\modules\v1\controllers;

use yii\data\Pagination;
use common\models\Article;
use yii\data\ActiveDataProvider;
use api\modules\controllers\ApiControllers;

class ArticlesController extends ApiControllers
{
    public $modelClass = 'common\models\Article';

    protected $optional = ['index', 'view'];

    public function actions()
    {
        $actions = parent::actions();

        unset($actions['index']);

        return $actions;
    }

    //重写 $actions['index']
    public function actionIndex()
    {
        return new ActiveDataProvider([
            'query' => Article::find()->select('id, title, created_at'),
            // 设置分页，比如每页5个条目
            'pagination' => new Pagination(['pageSize' => 5])
        ]);
    }
}
