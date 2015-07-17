<?php

namespace backend\modules\catalog\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CatItemsRow;

/**
 * CatItemsRowSearch represents the model behind the search form about `common\models\CatItemsRow`.
 */
class CatItemsRowSearch extends CatItemsRow
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'data'], 'integer'],
            [['name', 'name_t', 'type'], 'safe'],
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
        $query = CatItemsRow::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'name_t', $this->name_t])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
