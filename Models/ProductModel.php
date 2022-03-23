<?php

class ProductModel extends BaseModel
{
	const TABLE = 'products';

	public function getAll($select = ['*'], $orderBy = [], $limit = 15)
	{
		return $this->all(self::TABLE, $select, $orderBy, $limit);
	}

	public function findById($id)
	{
		return [
			'id' => 12,
			'name' => 'iphone 12'
		];
	}

	public function store($data)
	{	
		return $this->create(self::TABLE, $data);
	}

	public function updateData($id, $data)
	{
		return $this->update(self::TABLE, $id, $data);
	}

}

?>