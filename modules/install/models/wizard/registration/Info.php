<?php

namespace app\modules\install\models\wizard\registration;


use Yii;

class Info extends \yii\base\Model
{

    public $errors = false;
    public $writeAble = array(
        YII_DEBUG ? 'config/db_local.php' : 'config/db.php',
        'web/assets',
        'web/uploads',
        'runtime',
    );
    public $chmod = array(
        'web/.htaccess' => 666,
        'web/robots.txt' => 666,
        //  'web/uploads' => 750
    );
    public $warning;

    public function rules()
    {
        return [
            ['warning', 'safe'],
        ];
    }

    public function isWritable($path)
    {
        $fullPath = Yii::getAlias('@app') . DIRECTORY_SEPARATOR . $path;
        return is_writable($fullPath);
    }

    public function hasErrors($attribute = null)
    {
        foreach ($this->writeAble as $path) {
            $result = $this->isWritable($path);
            if ($result) {
                return false;
            } else {
                return true;
            }
        }
    }

}
