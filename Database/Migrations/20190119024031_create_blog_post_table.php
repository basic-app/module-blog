<?php

namespace BasicApp\Blog\Database\Migrations;

class Migration_create_blog_post_table extends \BasicApp\Core\Migration
{

	public $tableName = 'blog_posts';

	public function up()
	{
		$this->forge->addField([
			'post_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true
			],
			'post_created_at' => [
				'type' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
				'null' => true
			],
			'post_updated_at' => [
				'type' => 'TIMESTAMP NULL',
				'default' => null
			],
			'post_slug' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
				'default' => null,
				'unique' => true
			],
			'post_title' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
				'default' => null
			],
			'post_description' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
				'default' => null
			],			
			'post_text' => [
				'type' => 'TEXT',
				'constraint' => 65535,
				'null' => true,
				'default' => null
			],
			'post_active'  => [
				'type' => 'INT',
				'constraint' => 1,
				'unsigned' => true,
				'null' => false,
				'default' => 0
			]
		]);

		$this->forge->addKey('post_active');

		$this->forge->addKey('post_id', true);

		$this->forge->createTable($this->tableName, false, ['ENGINE' => 'InnoDB']);
	}

	public function down()
	{
		$this->forge->dropTable($this->tableName, false);
	}

}
