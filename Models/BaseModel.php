<?php

class BaseModel extends Database
{
	protected $connect;

	public function __construct()
	{
		$this->connect = $this->connect();
	}

	private function _query($sql)
	{
		return mysqli_query($this->connect, $sql);
	}

	/**
	 * Lay ra tat ca du lieu trong bang
	*/
	public function all($table, $select = ['*'], $orderBys = [], $limit)
	{
		$columnSelect = implode(',', $select);

		$orderBysOption = implode(' ', $orderBys);
		
		if ($orderBysOption) {
			$sql = "SELECT $columnSelect FROM $table ORDER BY $orderBysOption LIMIT $limit";
		} else {
			$sql = "SELECT $columnSelect FROM $table LIMIT $limit";

		}

		$query = $this->_query($sql);

		$data = [];

		while ($row = mysqli_fetch_assoc($query)) {
		    array_push($data, $row);
		}
		return $data;
	}

	/**
	 * Lay ra 1 ban ghi trong bang
	*/
	public function find($table, $id)
	{
		$sql = "SELECT * FROM $table WHERE id = $id";
		$query = $this->_query($sql);
		return $row = mysqli_fetch_assoc($query);
	}

	/**
	 * Them du lieu vao bang
	*/
	public function create($table, $data)
	{
		$columns = implode(',', array_keys($data));
		//$values = implode(',', array_values($data));
		print_r($data);
		die;
		$newValues = array_map(function($value){
			return "'" . $value . "'";
		}, array_values($data));
		$newValues = implode(',', $newValues);

		$sql = "INSERT INTO $table($columns) VALUES($newValues)";

		$this->_query($sql);
	}

	/**
	 * Cap nhat du lieu vao bang
	*/
	public function update($table, $id, $data)
	{
		$dataSets = [];
		foreach($data as $key => $value)
		{
			array_push($dataSets, "$key = '" . $value . "'");
		}
		$dataSetString = implode(',', $dataSets);

		$sql = "UPDATE $table SET $dataSetString WHERE id = $id";

		$this->_query($sql);
	}

	/**
	 * Xoa du lieu vao bang
	*/
	public function delete($table, $id)
	{
		$sql = "DELETE FROM $table WHERE id = $id";
		$this->_query($sql);
	}

}
?>