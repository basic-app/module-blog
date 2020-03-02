<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Blog\Models\Admin;

abstract class BaseBlogPostModel extends \BasicApp\Blog\Models\BlogPostModel
{

    protected $returnType = BlogPost::class;

	protected $allowedFields = [
		'post_slug',
		'post_title',
		'post_text',
		'post_published',
		'post_description',
		'post_active',
        'post_lang'
	];

	protected $validationRules = [
		'post_title' => 'not_special_chars|max_length[255]|required',
		'post_description' => 'not_special_chars|max_length[255]|required',
		'post_slug' => 'permit_empty|alpha_dash|max_length[255]|is_unique[posts.post_slug,post_id,{post_id}]',
		'post_text' => 'max_length[65535]',
		'post_active' => 'in_list[0,1]',
        'post_lang' => 'not_special_chars|max_length[2]'
	];

}