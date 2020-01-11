<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Blog\Database\Seeds;

class BlogResetSeeder extends \BasicApp\Core\Seeder
{

    public function run()
    {
        $this->db->table('posts')->truncate();
    }

}