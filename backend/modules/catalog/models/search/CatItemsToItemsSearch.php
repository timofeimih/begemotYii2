<?php

namespace backend\modules\catalog\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CatItemsToItems;

/**
 * CatItemsToItemsSearch represents the model behind the search form about `common\models\CatItemsToItems`.
 */
class CatItemsToItemsSearch extends CatItemsToItems
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'itemId', 'toItemId'], 'integer'],
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
        $query = CatItemsToItems::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'itemId' => $this->itemId,
            'toItemId' => $this->toItemId,
        ]);

        return $dataProvider;
    }
}
