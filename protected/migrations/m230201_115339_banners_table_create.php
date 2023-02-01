<?php

class m230201_115339_banners_table_create extends CDbMigration
{
	public function up()
	{
        $this->createTable('banners', [
            'id'            => 'int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'title'         => 'varchar(255)',
            'text'         => 'text',
            'status'         => 'tinyint(1) NOT NULL DEFAULT 0',
            'views_count'   => 'int(10)  NOT NULL',
        ]);
	}

    public function down()
	{
        $this->dropTable('banners');
        return true;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}