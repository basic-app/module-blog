<?php
/**
 * @package Basic App Blog
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Blog\Database\Migrations;

class Migration_create_blog_post_table extends \BasicApp\Core\Migration
{

	public $tableName = 'blog_posts';

	public function up()
	{
		$this->forge->addField([
			'post_id' => $this->primaryKeyColumn(),
			'post_created_at' => $this->createdColumn(),
			'post_updated_at' => $this->updatedColumn(),
			'post_slug' => $this->stringColumn(['unique' => true]),
			'post_title' => $this->stringColumn(),
			'post_description' => $this->stringColumn(),	
			'post_text' => $this->textColumn(),
			'post_active' => $this->booleanColumn()
		]);

		$this->forge->addKey('post_active');

		$this->forge->addKey('post_id', true);

		$this->createTable($this->tableName, false, ['ENGINE' => 'InnoDB']);
	}

	public function down()
	{
		$this->dropTable($this->tableName, false);
	}

}
