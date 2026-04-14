<?php
/**
 * @package Basic App Blog
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Blog\Controllers;

use BasicApp\Blog\Models\BlogPostModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Controllers\BaseController;

abstract class BaseBlogPost extends BaseController
{
	public function index()
	{
		$query = model(BlogPostModel::class);

		$query->where('post_active', 1);

		$query->orderBy('post_created_at DESC');
	
		$elements = $query->paginate(2, 'default');

        $pager = $query->pager;

        return view('BasicApp\Blog/index', [
            'elements' => $elements,
            'pager' => $pager
        ]);
	}

	public function view($id)
	{
		$query = model(BlogPostModel::class);

		$query->where('post_active', 1);

		$query->where('post_id', $id);

		$data = $query->first();

		if (!$data)
		{
			throw new PageNotFoundException;
		}

        return view('BasicApp\Blog/view', [
            'data' => $data
        ]);
	}
}