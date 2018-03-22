<?php
/**
 * Created by PhpStorm.
 *
 * User: sunhuanzhi
 * Date: 2018/3/22
 * Time: 9:49
 */

namespace backend\models\search;

use Yii;
use backend\models\Rabc;
use yii\data\ArrayDataProvider;

class RabcSearch extends Rabc
{
    public function search($params)
    {
        $authManager = Yii::$app->getAuthManager();
        $roles = $authManager->getRoles();

        $dataProvider = new ArrayDataProvider([
            'allModels' => $roles,
            'pagination' => [
                'pageSize' => -1,
            ],
        ]);

        return $dataProvider;
    }

}