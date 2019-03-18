<?php

namespace BasicApp\Blog\Database\Migrations;

use CodeIgniter\Database\Migration;
use BasicApp\Blog\Models\BlogPostModel;

class Migration_blog_post_init extends Migration
{

	public function up()
	{
        $query = BlogPostModel::factory();

        $query->protect(false)->insert([
            'post_slug' => 'first-post',
            'post_title' => 'First Post',
            'post_description' => 'First post description.',
            'post_text' => '# First Post' . "\n" . 'Text.',
            'post_active' => 1
        ])->protect(true);
	}

	public function down()
	{
        // nothing to do
	}

}