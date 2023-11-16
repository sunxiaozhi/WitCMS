<?php
/**
 * 文章列表小部件.
 * User: sunxiaozhi
 * Date: 2019/5/28 9:35
 */
namespace frontend\widgets\articles;

use yii\widgets\ListView;

/**
 * Class ArticlesListView
 * @package frontend\widgets\articles
 *
 * 使用方法：
 *  ArticlesListView::widget([
 *      'dataProvider' => $dataProvider,
 *      'itemView' => '@frontend/widgets/articles/views/list',
 *  ]
 */
class ArticlesListView extends ListView
{
    public $layout = '{items}<div class="pagination pagination-centered">{pager}</div>';
}