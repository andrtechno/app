<?php

namespace app\modules\install\models\wizard\registration;

use panix\engine\db\Connection;
use Yii;

class Db extends \yii\base\Model
{

    public $db_host = 'localhost';
    public $db_name;
    public $db_user;
    public $db_password;
    public $db_prefix = 'cms_';
    public $db_charset = 'utf8';
    public $db_type = 'mysql';

    public function rules()
    {
        return [
            [['db_host', 'db_name', 'db_user', 'db_prefix', 'db_charset', 'db_type'], 'required'],
            [['db_password'], 'checkDbConnection'],
        ];
    }

    public function checkDbConnection($attribute)
    {

        if (!$this->hasErrors()) {


            try {
                $connection = new Connection([
                    'dsn' => $this->getDsn(),
                    'username' => $this->db_user,
                    'password' => $this->db_password,
                ]);

                $connection->open();

            } catch (\yii\db\Exception $e) {
                $this->addError($attribute, ($e->getCode() == 1045) ? $e->getMessage() : Yii::t('install/default', 'ERROR_CONNECT_DB')); //
            }
            //  print_r($this->getErrors());die;
        }
    }

    public function attributeLabels()
    {
        return [
            'db_host' => Yii::t('install/default', 'DB_HOST'),
            'db_name' => Yii::t('install/default', 'DB_NAME'),
            'db_user' => Yii::t('install/default', 'DB_USER'),
            'db_prefix' => Yii::t('install/default', 'DB_PREFIX'),
            'db_password' => Yii::t('install/default', 'DB_PASSWORD'),
            'db_charset' => Yii::t('install/default', 'DB_CHARSET'),
            'db_type' => Yii::t('install/default', 'DB_TYPE'),
        ];
    }

    public function install()
    {
        if ($this->hasErrors())
            return false;

        Yii::$app->cache->flush();


        Yii::$app->set('db', [
            'class' => 'panix\engine\db\Connection',
            'dsn' => $this->getDsn(),
            'username' => $this->db_user,
            'password' => $this->db_password,
            'charset' => $this->db_charset,
            'tablePrefix' => $this->db_prefix
        ]);


        $this->writeConnectionSettings();
        $this->importSqlDump();
    }

    public function getDbCharset()
    {
        return [
            'utf8' => 'UTF-8',
            'cp1251' => 'cp1251',
            'latin1' => 'latin1'
        ];
    }

    public function getDbTypes()
    {
        return [
            "mysql" => 'MySQL/MariaDB',
            "sqlite" => 'SQLite',
            "pgsql" => 'PostgreSQL',
            "mssql" => 'SQL Server',
            "oci" => 'Oracle'
        ];
    }

    public function getDsn()
    {
        if ($this->db_type == 'pgsql') {
            return strtr('pgsql:host={host};port=5432;dbname={db_name}', array(
                '{host}' => $this->db_host,
                '{db_name}' => $this->db_name,
            ));
        } elseif ($this->db_type == 'oci') {
            return strtr('oci:dbname=//{host}/{db_name}', array(
                '{host}' => $this->db_host,
                '{db_name}' => $this->db_name,
            ));
        } elseif ($this->db_type == 'sqlite') {
            return strtr('sqlite:dbname={host}/{db_name}', array(
                '{host}' => $this->db_host,
                '{db_name}' => $this->db_name,
            ));
        } else {
            return strtr('{db_type}:host={host};dbname={db_name}', array(
                '{host}' => $this->db_host,
                '{db_name}' => $this->db_name,
                '{db_type}' => $this->db_type,
            ));
        }
    }

    private function writeConnectionSettings()
    {
        $configFiles[] = Yii::getAlias('@app/config') . DIRECTORY_SEPARATOR . 'db.php';
        $configFiles[] = Yii::getAlias('@app/config') . DIRECTORY_SEPARATOR . 'db_local.php';
        foreach ($configFiles as $file) {
            $content = file_get_contents($file);
            $content = preg_replace("/\'dsn\'\s*\=\>\s*\'.*\'/", "'dsn'=>'{$this->getDsn()}'", $content);
            $content = preg_replace("/\'username\'\s*\=\>\s*\'.*\'/", "'username'=>'{$this->db_user}'", $content);
            $content = preg_replace("/\'password\'\s*\=\>\s*\'.*\'/", "'password'=>'{$this->db_password}'", $content);
            $content = preg_replace("/\'tablePrefix\'\s*\=\>\s*\'.*\'/", "'tablePrefix'=>'{$this->db_prefix}'", $content);
            $content = preg_replace("/\'charset\'\s*\=\>\s*\'.*\'/", "'charset'=>'{$this->db_charset}'", $content);
            file_put_contents($file, $content);
        }
    }

    private function importSqlDump()
    {
        $sqlDumpPath = Yii::getAlias('@app/modules/install/migrations') . DIRECTORY_SEPARATOR . 'scheme.sql';
        $sqlRows = preg_split("/--\s*?--.*?\s*--\s*/", file_get_contents($sqlDumpPath));
        Yii::$app->db->createCommand("SET NAMES '" . $this->db_charset . "';");
        foreach ($sqlRows as $q) {
            $q = trim($q);
            if (!empty($q)) {
                $q = str_replace("{prefix}", $this->db_prefix, $q);
                $q = str_replace("{charset}", $this->db_charset, $q);
                if (strpos($q, 'DROP TABLE IF EXISTS') === false) {
                    Yii::$app->db->createCommand($q)->execute();
                } else {
                    $lines = preg_split("/(\r?\n)+/", $q);
                    $dropQuery = $lines[0];
                    array_shift($lines);
                    $query = implode('', $lines);

                    Yii::$app->db->createCommand($dropQuery)->execute();
                    Yii::$app->db->createCommand($query)->execute();
                }
            }
        }
    }

}
