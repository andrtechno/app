<?php

namespace app\modules\presentation\models\search;


use Yii;
use yii\base\Model;
use panix\engine\data\ActiveDataProvider;
use app\modules\presentation\models\Presentation;

class PresentationSearch extends Presentation
{


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['filename', 'date_create'], 'safe'],

            [['text'], 'string'],
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
        $query = Presentation::find();
        //$query->joinWith('translations');
        //$query->with('translations');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => self::getSort(),
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
        $words = explode(' ', $this->text);
        $searchList = [];
        $searchList[] = 'or';
        foreach ($words as $word) {
            $searchList[] = ['like', 'text', $word];
        }

        $query->andFilterWhere($searchList);
        // $query->andFilterWhere(['or like', 'text', '%'.$this->text.'%',false]);
        // $query->andFilterWhere(['like', PagesTranslate::tableName().'.name', $this->name]);
        // $query->andFilterWhere(['like', 'DATE(date_create)', $this->date_create]);
        // $query->andFilterWhere(['like', 'DATE(date_update)', $this->date_update]);
        // $query->andFilterWhere(['like', 'text', '%'.$this->text,false]);

        // $query->andWhere(['LIKE' ,'text',strtr($this->text,['%'=>'\%', '_'=>'\_', '\\'=>'\\\\']).'%', false]);

        return $dataProvider;
    }

    public static function getSort()
    {
        $sort = new \yii\data\Sort([
            'attributes' => [
                'slides',
                'width',
                'height',
                'name',
                'filename',
                'date_create',
                'date_update',

            ],
        ]);
        return $sort;
    }
}
