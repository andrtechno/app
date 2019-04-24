<?php

namespace app\modules\seo\models\search;

use panix\engine\data\ActiveDataProvider;
use app\modules\seo\models\Redirects;

class RedirectsSearch extends Redirects {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id'], 'integer'],
            [['url_to','url_from'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return \yii\base\Model::scenarios();
    }

    /**
     * @inheritdoc
     */
    public function search($params=array()) {
        $query = Redirects::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);


        $query->andFilterWhere(['like', 'url_from', $this->url_from]);
        $query->andFilterWhere(['like', 'url_to', $this->url_to]);

        return $dataProvider;
    }

}
