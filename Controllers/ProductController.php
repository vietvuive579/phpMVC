<?php

class ProductController extends BaseController
{
	private $productModel;
	public function __construct()
	{
		$this->loadModel('ProductModel');
		$this->productModel = new ProductModel;
	}

	public function index()
	{
		$selectColumns = ['id', 'name', 'category_id'];
		$order = ['id', 'desc'];
		$products = $this->productModel->getAll(
			$selectColumns,$order
		);

		return $this->view('frontend.products.index', [
			'testLoadViewProduct' => 'Viet oi co len',
			'products' => $products,
		]);
		
	}

	public function store()
	{
		$data = [
			'name'        => 'iphone X',
			'price'       => '10000000',
			'image'       => null,
			'category_id' => 4
		];
		$this->productModel->store($data);
	}

	public function update()
	{
		$id = $_GET['id'];
		$data = [
			'name'        => 'iphone 12',
			'price'       => '20000000',
			'image'       => null,
			'category_id' => 3
		];
		$this->productModel->updateData($id, $data);
	}

	public function show()
	{
		$product = $this->productModel->findById(1);
		return $this->view('frontend.products.show', [
			'product' => $product,
		]);
	}
}
?>