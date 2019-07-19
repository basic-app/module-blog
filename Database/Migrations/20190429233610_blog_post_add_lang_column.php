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
        $this->forge->addColumn($this->tableName, [
            'post_lang' => $this->langColumn()
        ]);

        $this->dropUniqueKey($this->tableName, 'post_slug');

        $this->createUniqueKey($this->tableName, ['post_slug', 'post_lang']);
	}

	public function down()
	{
        $this->dropUniqueKey($this->tableName, ['post_slug', 'post_lang']);

        $this->dropColumn($this->tableName, 'post_lang');

        $this->createUniqueKey($this->tableName, ['post_slug']);
	}

}