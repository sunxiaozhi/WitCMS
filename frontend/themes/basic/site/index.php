<?php

use frontend\widgets\ArticleListView;

?>

<div class="span9">
    <?= ArticleListView::widget([
            'dataProvider' => $dataProvider,//数据提供器
        ]
    ) ?>
</div>