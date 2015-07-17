<?php

namespace backend\modules\catalog\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CatItems;

/**
 * CatItemsSearch represents the model behind the search form about `common\models\CatItems`.
 */
class CatItemsSearch extends CatItems
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'catId', 'published', 'pub_date', 'create_time', 'order', 'authorId', 'top', 'quantity', 'delivery_date'], 'integer'],
            [['name', 'name_t', 'data', 'text', 'seo_title', 'Podpis', 'HARAKTERISTIKI', 'update_time', 'bazovaya_komplektaciya', 'Standartnoe_oborudovanie', 'Osobennosti', 'sdasdasd', 'article', 'Test_novogo_polya2', 'Tekstpole', 'Nazvanie', 'Nazvanie123213213'], 'safe'],
            [['price'], 'number'],
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
        $query = CatItems::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'price' => $this->price,
            'catId' => $this->catId,
            'published' => $this->published,
            'pub_date' => $this->pub_date,
            'create_time' => $this->create_time,
            'order' => $this->order,
            'authorId' => $this->authorId,
            'top' => $this->top,
            'quantity' => $this->quantity,
            'delivery_date' => $this->delivery_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'name_t', $this->name_t])
            ->andFilterWhere(['like', 'data', $this->data])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'seo_title', $this->seo_title])
            ->andFilterWhere(['like', 'Podpis', $this->Podpis])
            ->andFilterWhere(['like', 'HARAKTERISTIKI', $this->HARAKTERISTIKI])
            ->andFilterWhere(['like', 'update_time', $this->update_time])
            ->andFilterWhere(['like', 'bazovaya_komplektaciya', $this->bazovaya_komplektaciya])
            ->andFilterWhere(['like', 'Standartnoe_oborudovanie', $this->Standartnoe_oborudovanie])
            ->andFilterWhere(['like', 'Osobennosti', $this->Osobennosti])
            ->andFilterWhere(['like', 'sdasdasd', $this->sdasdasd])
            ->andFilterWhere(['like', 'article', $this->article])
            ->andFilterWhere(['like', 'Test_novogo_polya2', $this->Test_novogo_polya2])
            ->andFilterWhere(['like', 'Tekstpole', $this->Tekstpole])
            ->andFilterWhere(['like', 'Nazvanie', $this->Nazvanie])
            ->andFilterWhere(['like', 'Nazvanie123213213', $this->Nazvanie123213213]);

        return $dataProvider;
    }
}
