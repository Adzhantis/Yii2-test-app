<?php

use yii\db\Migration;

class m160318_104931_authors extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%authors}}', [
            'id' => 'INT NOT NULL AUTO_INCREMENT',
            'first_name' => 'VARCHAR(60) NOT NULL',
            'last_name' => 'VARCHAR(60) NOT NULL',

            'PRIMARY KEY (`id`)'

        ], $tableOptions);



        $this->db->schema->refresh();

    }

    public function down()
    {
        $this->dropTable('{{%authors}}');
    }
}
