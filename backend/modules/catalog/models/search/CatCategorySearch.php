<?php

namespace backend\modules\catalog\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CatCategory;

/**
 * CatCategorySearch represents the model behind the search form about `common\models\CatCategory`.
 */
class CatCategorySearch extends CatCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pid', 'order', 'dateCreate', 'dateUpdate', 'status', 'level'], 'integer'],
            [['name', 'text', 'name_t', 'seo_title'], 'safe'],
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
        $query = CatCategory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;

        }



        $query->andFilterWhere([
            'id' => $this->id,
            'pid' => $this->pid,
            'order' => $this->order,
            'dateCreate' => $this->dateCreate,
            'dateUpdate' => $this->dateUpdate,
            'status' => $this->status,
            'level' => $this->level,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'name_t', $this->name_t])
            ->andFilterWhere(['like', 'seo_title', $this->seo_title]);


        if ($this->pid==-1){
            $this->level=0;
        } else{
            $parentCategory = CatCategory::find()->where(['id' => $this->pid])->all();
            $parentCategory = $parentCategory[0];
            $this->level=$parentCategory->level+1;
        }

        return $dataProvider;
    }
}
