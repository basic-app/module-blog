<?php

namespace BasicApp\Blog\Database\Migrations;

class Migration_blog_post_add_lang_column extends \BasicApp\Core\Migration
{

    public $tableName = 'blog_posts';

	public function up()
	{
        /*
        $this->forge->addColumn($this->tableName, [
            'post_lang' => [
                'type' => 'CHAR',
                'constraint' => 2,
                'null' => false,
                'default' => 'en'
            ]
        ]);

        $this->dropKey($this->tableName, 'post_slug');
        */

        $this->addKey($this->tableName, ['post_slug', 'post_lang'], false, true);
	}

	public function down()
	{
        $this->forge->dropColumn($this->tableName, 'post_lang');
	}

}