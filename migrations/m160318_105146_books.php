<?php

use yii\db\Migration;

class m160318_105146_books extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%books}}', [
            'id' => 'INT NOT NULL AUTO_INCREMENT',
            'name' => 'VARCHAR(60) NULL DEFAULT NULL',
            'preview' => 'VARCHAR(60) NULL DEFAULT NULL',
            'date_create' => 'INT(11) NOT NULL',
            'date_update' => 'INT(11) NULL DEFAULT NULL',
            'date' => 'INT(11) NULL DEFAULT NULL',
            'author_id' => 'INT',
            
            'PRIMARY KEY (`id`)',
        ], $tableOptions);

        $this->createIndex('books_author_id_idx', '{{%books}}', 'author_id');

        $this->addForeignKey(
            'fk_author_id', '{{%books}}', 'author_id', '{{%authors}}', 'id', 'SET NULL', 'CASCADE'
        );

    }

    public function down()
    {
        $this->dropTable('{{%books%}}');
    }

   
}
