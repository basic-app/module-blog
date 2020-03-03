<?php

$routes->add('blog', '\BasicApp\Blog\Controllers\BlogPost::index');
$routes->get('{locale}/blog', '\BasicApp\Blog\Controllers\BlogPost::index');

$routes->add('blog/(:num)-(:segment)', '\BasicApp\Blog\Controllers\BlogPost::view/$1');
$routes->add('{locale}/blog/(:num)-(:segment)', '\BasicApp\Blog\Controllers\BlogPost::view/$1');

$routes->add('blog/(:num)', '\BasicApp\Blog\Controllers\BlogPost::view/$1');
$routes->add('{locale}/blog/(:num)', '\BasicApp\Blog\Controllers\BlogPost::view/$1');

$routes->add('admin/blog-post', '\BasicApp\Blog\Controllers\Admin\BlogPost::index');
$routes->add('{locale}/admin/blog-post', '\BasicApp\Blog\Controllers\Admin\BlogPost::index');

$routes->add('admin/blog-post/(:segment)', '\BasicApp\Blog\Controllers\Admin\BlogPost::$1');
$routes->add('{locale}/admin/blog-post/(:segment)', '\BasicApp\Blog\Controllers\Admin\BlogPost::$1');