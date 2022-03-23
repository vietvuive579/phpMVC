<?php 

class CategoryController extends BaseController
{
	private $categoryModel;
	public function __construct()
	{
		$this->loadModel('CategoryModel');
		$this->categoryModel = new CategoryModel;
	}

	public function index()
	{
		$categories = $this->categoryModel->getAll(
			['*'],
			['name', 'desc']
		);

	
		$pageName = 'Come on Viet';
		return $this->view('frontend.categories.index', [
			'pageName' => $pageName,
			'categories' => $categories,
		]);
	}

	public function show()
	{
		$id = $_GET['id'];
		$category = $this->categoryModel->findById($id);
		return $this->view('frontend.categories.show', [
			'category' => $category,
		]);
	}

	public function update()
	{
		$id = $_GET['id'];
		$data = [
			'name' => 'printer'
		];
		$this->categoryModel->updateData($id, $data);
	}

	public function delete()
	{
		$id = $_GET['id'];
		$this->categoryModel->delData($id);
	}
}
?>