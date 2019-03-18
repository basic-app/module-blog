<?php

namespace BasicApp\Blog\Controllers;

use BasicApp\Blog\Models\BlogPostModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class BlogPost extends \BasicApp\Core\PublicController
{

	protected $perPage = 10;

	protected $orderBy = 'post_created_at DESC';

    protected $viewPath = 'BasicApp\Blog\BlogPost';

	public function index()
	{
		$query = new BlogPostModel;

		$query->where('post_active', 1);

		if ($this->orderBy)
		{
			$query->orderBy($this->orderBy);
		}

		if ($this->perPage)
		{
			$elements = $query->paginate($this->perPage);
		}
		else
		{
			$elements = $query->findAll();
		} 

		return $this->render('index', [
			'elements' => $elements,
			'pager' => $query->pager
		]);
	}

	public function view($id)
	{
		$query = new BlogPostModel;

		$query->where('post_active', 1);

		$query->where('post_id', $id);

		$model = $query->first();

		if (!$model)
		{
			throw new PageNotFoundException;
		}

		return $this->render('view', [
			'model' => $model
		]);
	}

}