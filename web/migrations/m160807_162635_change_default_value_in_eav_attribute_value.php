<?php

use yii\db\Migration;

class m160807_162635_change_default_value_in_eav_attribute_value extends Migration
{
    public function up()
    {
        $this->alterColumn('{{%eav_attribute_value}}', 'value', $this->text()->null());
    }

    public function down()
    {
        echo "m160807_162635_change_default_value_in_eav_attribute_value cannot be reverted.\n";

        return false;
    }

}
