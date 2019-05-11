<?php
/**
 * @package Basic App Blog
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Blog\Database\Migrations;

class Migration_blog_post_add_lang_column extends \BasicApp\Core\Migration
{

    public $tableName = 'blog_posts';

	public function up()
	{
        $app = config('app');

        $this->forge->addColumn($this->tableName, [
            'post_lang' => $this->langColumn()
        ]);

        $this->tableDropKey($this->tableName, 'post_slug');

        $this->tableAddKey($this->tableName, ['post_slug', 'post_lang'], false, true);
	}

	public function down()
	{
        $this->forge->dropColumn($this->tableName, 'post_lang');
	}

}