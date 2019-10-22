<?php

namespace BasicApp\Blog\Database\Seeds;

use BasicApp\Blog\Models\BlogPostModel;

class BlogSeeder extends \CodeIgniter\Database\Seeder
{

    public function run()
    {
        if ($this->db->table('posts')->countAllResults() > 0)
        {
            return;
        }

        BlogPostModel::factory()->protect(false)->insert([
            'post_slug' => 'first-post',
            'post_title' => 'First Post Title',
            'post_description' => 'First post description.',
            'post_text' => 'First post text.',
            'post_active' => 1
        ]);
    }

}