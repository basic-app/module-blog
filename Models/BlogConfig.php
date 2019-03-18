<?php

namespace BasicApp\Blog\Models;

use BasicApp\Core\DatabaseConfig;

class BlogConfig extends DatabaseConfig
{

    public $admin_editor_class = 'markdown'; // editor

}