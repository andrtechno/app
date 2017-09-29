<?php

namespace app\modules\install\forms;

use Yii;
use panix\engine\db\Connection;

class Db extends \yii\base\Model {

    public $db_host = 'localhost';
    public $db_name;
    public $db_user;
    public $db_password;
    public $db_prefix = 'cms_';
    public $db_charset = 'utf8';
    public $db_type = 'mysql';

    public function rules() {
        return [
            [['db_host', 'db_name', 'db_user', 'db_prefix', 'db_charset', 'db_type'], 'required'],
            ['db_password', 'checkDbConnection'],
        ];
    }

    public function attributeLabels() {
        return array(
            'db_host' => Yii::t('install/default', 'DB_HOST'),
            'db_name' => Yii::t('install/default', 'DB_NAME'),
            'db_user' => Yii::t('install/default', 'DB_USER'),
            'db_prefix' => Yii::t('install/default', 'DB_PREFIX'),
            'db_password' => Yii::t('install/default', 'DB_PASSWORD'),
            'db_charset' => Yii::t('install/default', 'DB_CHARSET'),
            'db_type' => Yii::t('install/default', 'DB_TYPE'),
        );
    }

    public function install() {
        if ($this->hasErrors())
            return false;

        Yii::$app->cache->flush();
       // $conn = new Connection($this->getDsn(), $this->db_user, $this->db_password);

                    $conn = new Connection([
            'dsn' => $this->getDsn(),
            'username' => $this->db_user,
            'password' => $this->db_password,
                ]);
        $conn->charset = $this->db_charset;
        $conn->tablePrefix = $this->db_prefix;
        //Yii::$app->setComponent('db', $conn);
        $this->importSqlDump();
        $this->writeConnectionSettings('_db');
    }

    public function ____install() {
        if ($this->hasErrors())
            return false;


                    $conn = new Connection([
            'dsn' => $this->getDsn(),
            'username' => $this->db_user,
            'password' => $this->db_password,
                ]);
      //  $conn = new Connection($this->getDsn(), $this->db_user, $this->db_password);
        $conn->charset = $this->db_charset;
        $conn->tablePrefix = $this->db_prefix;
        //Yii::$app->setComponent('db', $conn);
        $this->importSqlDump();
        $this->writeConnectionSettings();
        // Activate languages
        Yii::$app->languageManager->setActive();
    }

    public function getDsn() {
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

    public function checkDbConnection() {
        if (!$this->hasErrors()) {
            die('mo err');
                    $connection = new Connection([
            'dsn' => $this->getDsn(),
            'username' => $this->db_user,
            'password' => $this->db_password,
                ]);
                    
          //  $connection = new Connection($this->getDsn(), $this->db_user, $this->db_password);
            try {
                $connection->connectionStatus;
            } catch (\yii\db\Exception $e) {
                $this->addError('db_password', Yii::t('install/default', 'ERROR_CONNECT_DB'));
            }
        }
    }

    private function writeConnectionSettings() {
        $configFile = Yii::getAlias('@webroot/config') . DIRECTORY_SEPARATOR . 'db.php';

        $content = file_get_contents($configFile);
        $content = preg_replace("/\'dsn\'\s*\=\>\s*\'.*\'/", "'dsn'=>'{$this->getDsn()}'", $content);
        $content = preg_replace("/\'username\'\s*\=\>\s*\'.*\'/", "'username'=>'{$this->db_user}'", $content);
        $content = preg_replace("/\'password\'\s*\=\>\s*\'.*\'/", "'password'=>'{$this->db_password}'", $content);
        $content = preg_replace("/\'tablePrefix\'\s*\=\>\s*\'.*\'/", "'tablePrefix'=>'{$this->db_prefix}'", $content);
        $content = preg_replace("/\'charset\'\s*\=\>\s*\'.*\'/", "'charset'=>'{$this->db_charset}'", $content);
        file_put_contents($configFile, $content);

    }

    private function importSqlDump() {

        $sqlDumpPath = Yii::getAlias('@app/modules/install/data') . DIRECTORY_SEPARATOR . 'dump.sql';
        $sqlRows = preg_split("/--\s*?--.*?\s*--\s*/", file_get_contents($sqlDumpPath));

        //$connection = new Connection($this->getDsn(), $this->db_user, $this->db_password);
        $connection = new Connection([
            'dsn' => $this->getDsn(),
            'username' => $this->db_user,
            'password' => $this->db_password,
                ]);
        $connection->charset = $this->db_charset;
        $connection->open();
        // $connection->active = true;

        $connection->createCommand("SET NAMES '" . $this->db_charset . "';");
       // var_dump($connection->isActive);
       // echo $this->getDsn();
       // die;
        foreach ($sqlRows as $q) {
            $q = trim($q);
            if (!empty($q)) {
                //$q = str_replace("{prefix}", $this->db_prefix, $stringdump[$i]);
                $q = str_replace("{prefix}", $this->db_prefix, $q);
                $q = str_replace("{charset}", $this->db_charset, $q);
                // $q = str_replace("{charset}", $this->db_charset, $q);
                if (strpos($q, 'DROP TABLE IF EXISTS') === false) {

                    $connection->createCommand($q)->execute();
                } else {
                    $lines = preg_split("/(\r?\n)+/", $q);
                    $dropQuery = $lines[0];
                    array_shift($lines);
                    $query = implode('', $lines);


                    $connection->createCommand($dropQuery)->execute();
                    $connection->createCommand($query)->execute();
                }
            }
        }
    }

}
