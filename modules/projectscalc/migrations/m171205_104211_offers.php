<?php

use panix\engine\db\Migration;
use app\modules\projectscalc\models\Offers;
use app\modules\projectscalc\models\OffersRedaction;
use app\modules\projectscalc\models\translate\OffersRedactionTranslate;

class m171205_104211_offers extends Migration {

    public function up() {
        $this->createTable(Offers::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'redaction_id' => $this->integer()->unsigned(),
            'calc_id' => $this->integer()->unsigned(),
            'date_create' => $this->timestamp()->defaultValue(null),
            'date_update' => $this->timestamp()
        ]);

        $this->createTable(OffersRedaction::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'date_create' => $this->timestamp()->defaultValue(null),
            'date_update' => $this->timestamp()
        ]);

        $this->createTable(OffersRedactionTranslate::tableName(), [
            'id' => $this->primaryKey()->unsigned(),
            'language_id' => $this->tinyInteger()->unsigned(),
            'object_id' => $this->integer()->unsigned(),
            'text' => $this->text(),
        ]);

        
        $this->createIndex('redaction_id', Offers::tableName(), 'redaction_id');
        $this->createIndex('calc_id', Offers::tableName(), 'calc_id');
        
        $this->createIndex('language_id', OffersRedactionTranslate::tableName(), 'language_id');
        $this->createIndex('object_id', OffersRedactionTranslate::tableName(), 'object_id');
    }

    public function down() {
        $this->dropTable(Offers::tableName());
        $this->dropTable(OffersRedaction::tableName());
        $this->dropTable(OffersRedactionTranslate::tableName());
    }

}
