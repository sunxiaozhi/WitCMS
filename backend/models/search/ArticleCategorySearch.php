<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ArticleCategory;
use backend\helpers\Tree;

/**
 * ArticleCategorySearch represents the model behind the search form of `common\models\ArticleCategory`.
 */
class ArticleCategorySearch extends ArticleCategory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'sort', 'created_at', 'updated_at'], 'integer'],
            [['name', 'alias', 'remark'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ArticleCategory::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'sort' => $this->sort,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        $query->orderBy(['sort' => SORT_ASC]);

        $arr = $query->asArray()->all();
        $treeObj = new Tree(\yii\helpers\ArrayHelper::toArray($arr));
        $treeObj->icon = ['&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ '];
        $treeObj->nbsp = '&nbsp;&nbsp;&nbsp;';
        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $treeObj->getGridTree(),
            'pagination' => [
                'pageSize' => 50,
            ],
        ]);

        return $dataProvider;
    }
}
