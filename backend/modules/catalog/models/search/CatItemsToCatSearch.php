<?php

namespace backend\modules\catalog\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CatItemsToCat;

/**
 * CatItemsToCatSearch represents the model behind the search form about `common\models\CatItemsToCat`.
 */
class CatItemsToCatSearch extends CatItemsToCat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'itemId', 'catId', 'order'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = CatItemsToCat::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'itemId' => $this->itemId,
            'catId' => $this->catId,
            'order' => $this->order,
        ]);

        return $dataProvider;
    }
}
