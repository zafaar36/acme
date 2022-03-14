<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%place_lang}}`.
 */
class m220311_190705_create_place_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%place_lang}}', [
            'id' => $this->primaryKey()->unsigned()->notNull(),
            'place_id' => $this->integer()->unsigned()->notNull(),
            'locality' => $this->string(45)->notNull(),
            'country' => $this->string(45)->notNull(),
            'lang' => $this->string(20)->notNull()
        ]);

        $this->createIndex('idx_place_lang_place_id_place', 'place_lang', 'place_id');

        $this->addForeignKey('fk_place_lang_place_id_place', 'place_lang', 'place_id', 'place', 'id',  'restrict', 'cascade' );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_place_lang_place_id_place', 'place_lang');
        $this->dropIndex('idx_place_lang_place_id_place', 'place_lang');
        $this->dropTable('{{%place_lang}}');
    }
}
