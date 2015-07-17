<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CallButtons;

/**
 * CallButtonsSearch represents the model behind the search form about `app\models\CallButtons`.
 */
class CallButtonsSearch extends CallButtons
{
    public function rules()
    {
        return [
            [['call_url', 'login', 'login_url'], 'required'],
            [['id', 'phone', 'user_id'], 'integer'],
            [['website'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = CallButtons::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'phone' => $this->phone,
        ]);

        $query->andFilterWhere(['like', 'website', $this->website]);

        return $dataProvider;
    }
}
