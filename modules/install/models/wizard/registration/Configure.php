<?php


namespace app\modules\install\models\wizard\registration;

use panix\mod\user\models\User;
use Yii;
use panix\engine\db\Connection;

class Configure extends \yii\base\Model
{

    public $site_name;
    public $admin_login;
    public $admin_email;
    public $admin_password;

    public function rules()
    {
        return [
            [['site_name', 'admin_login', 'admin_email', 'admin_password'], 'required'],
            ['admin_email', 'email'],
            ['admin_login', 'string', 'max' => 255],
            ['admin_password', 'string', 'min' => 4, 'max' => 40],
        ];
    }

    public function attributeLabels()
    {
        return [
            'site_name' => Yii::t('install/default', 'SITE_NAME'),
            'admin_login' => Yii::t('install/default', 'ADMIN_LOGIN'),
            'admin_email' => Yii::t('install/default', 'ADMIN_EMAIL'),
            'admin_password' => Yii::t('install/default', 'ADMIN_PASSWORD'),
        ];
    }

    public function install()
    {
        if ($this->hasErrors())
            return false;


        $config = require(Yii::getAlias('@app/config') . DIRECTORY_SEPARATOR . 'db.php');
        $db = $config;


        Yii::$app->set('db', [
            'class' => 'panix\engine\db\Connection',
            'dsn' => $db['dsn'],
            'username' => $db['username'],
            'password' => $db['password'],
            'charset' => $db['charset'],
            'tablePrefix' => $db['tablePrefix']
        ]);

        $settings = [];
        // Update app settings
        $settings['app'] = [
            'site_name' => $this->site_name,
            'admin_email' => $this->admin_email,
            'license_key' => $_SESSION['Wizard.stepData']['license'][0]['license_key'],
        ];

        if (Yii::$app->settings) {
            foreach (array('\panix\mod\admin\models\SettingsForm', '\panix\mod\admin\models\SettingsDatabaseForm') as $class) {

                if (method_exists(new $class, 'defaultSettings')) {
                    if (isset($settings[$class::$category])) {
                        $array = \yii\helpers\ArrayHelper::merge($class::defaultSettings(), $settings[$class::$category]);
                    } else {
                        $array = $class::defaultSettings();
                    }
                    Yii::$app->settings->set($class::$category, $array);
                }
            }
        }

        foreach (Yii::$app->getModules() as $mod => $data) {
            if ($mod != 'install') {
                $module = Yii::$app->getModule($mod);
                if ($module instanceof \panix\engine\WebModule) {
                    try {
                        if (method_exists($module, 'afterInstall')) {
                            $module->afterInstall();
                        }
                        Yii::$app->db->createCommand()->insert('{{%modules}}', array(
                            'name' => $mod,
                            'className' => get_class($module),
                            'access' => 0,
                        ))->execute();
                    } catch (\yii\db\Exception $e) {

                    }
                }
            }
        }


        try {

            $tableSchema = Yii::$app->db->schema->getTableSchema(User::tableName());
            if ($tableSchema) {
                // Table does not exist

                $model = User::findOne(1);

                if (!$model)
                    $model = new User;

                // Set user data
                $model->username = $this->admin_login;
                $model->email = $this->admin_email;
                $model->password = Yii::$app->security->generatePasswordHash($this->admin_password);
                // $model->date_registration = date('Y-m-d H:i:s');
                // $model->last_login = date('Y-m-d H:i:s');
                $model->status = 2;
                $model->role_id = 1; // 1 to admin
                $model->save(false);
            }
        } catch (\yii\db\Exception $e) {

        }


        /* if (Yii::$app->settings) {
          foreach (array('\panix\mod\admin\models\SettingsForm', '\panix\mod\admin\models\SettingsDatabaseForm') as $class) {
          if (method_exists(new $class, 'defaultSettings')) {
          if (isset($settings[$class::NAME])) {
          $array = \yii\helpers\ArrayHelper::mergeArray($class::defaultSettings(), $settings[$class::NAME]);
          } else {
          $array = $class::defaultSettings();
          }
          Yii::$app->settings->set($class::NAME, $array);
          }
          }
          } */


        return true;
    }

}
