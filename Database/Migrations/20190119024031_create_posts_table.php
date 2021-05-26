<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Blog\Database\Migrations;

class Migration_create_posts_table extends \BasicApp\Migration\BaseMigration
{

	public $tableName = 'posts';

	public function up()
	{
		$this->forge->addField([
			'post_id' => $this->primaryKey()->toArray(),
			'post_created_at' => $this->created()->toArray(),
			'post_updated_at' => $this->updated()->toArray(),
			'post_slug' => $this->string()->toArray(),
			'post_title' => $this->string()->toArray(),
			'post_description' => $this->string()->toArray(),
			'post_text' => $this->text()->toArray(),
			'post_active' => $this->boolean()->toArray()
		]);

		$this->forge->addKey('post_active');

		$this->forge->addKey('post_id', true);

        $this->forge->addKey(['post_slug'], false, true);

		$this->forge->createTable($this->tableName);
	}

	public function down()
	{
		$this->forge->dropTable($this->tableName);
	}

}
