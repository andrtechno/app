<?php

use yii\db\Migration;

/**
 * Class m171205_110702_test
 */
class m171205_110702_test extends \panix\engine\db\Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171205_110702_test cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171205_110702_test cannot be reverted.\n";

        return false;
    }
    */
}
