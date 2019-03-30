<?php

namespace app\modules\projectscalc\models\search;

use Yii;
use yii\base\Model;
use panix\engine\data\ActiveDataProvider;
use app\modules\projectscalc\models\Offers;

class OffersSearch extends Offers {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id'], 'integer'],
            [['customer_name','date_create'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Offers::find();
        //$query->joinWith('translations');
        //$query->with('translations');
        $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'sort'=> self::getSort(),
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

       // $query->andFilterWhere(['like', PagesTranslate::tableName().'.name', $this->name]);
       // $query->andFilterWhere(['like', 'DATE(date_create)', $this->date_create]);
       // $query->andFilterWhere(['like', 'DATE(date_update)', $this->date_update]);
        //$query->andFilterWhere(['like', 'views', $this->views]);

        return $dataProvider;
    }
    public static function getSort() {
        $sort = new \yii\data\Sort([
            'attributes' => [
                'date_create',
                'date_update',

            ],
        ]);
        return $sort;
    }
}
