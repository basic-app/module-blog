<?php
/**
 * @package Basic App Blog
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Blog\Controllers;

use Psr\Log\LoggerInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use BasicApp\Blog\Models\BlogPostModel;
use BasicApp\Blog\Config\Blog as BlogConfig;
use CodeIgniter\Exceptions\PageNotFoundException;

abstract class BaseBlogPost extends \BasicApp\Site\SiteController
{

	protected $perPage = 10;

	protected $orderBy = 'post_created_at DESC';

    protected $viewPath = 'BasicApp\Blog\BlogPost';

    protected $blogConfig;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->blogConfig = config(BlogConfig::class);
    }

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

		$data = $query->first();

		if (!$data)
		{
			throw new PageNotFoundException;
		}

		return $this->render('view', [
			'data' => $data
		]);
	}

}