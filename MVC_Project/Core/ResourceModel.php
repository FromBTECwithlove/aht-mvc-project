<?php

namespace MVC_Project\Core;

use MVC_Project\Config\Database;
use PDO;

class ResourceModel implements ResourceModelInterface 
{
	private $table;
	private $id;
	private $model;

	public function _init($table, $id, $model) {

		$this->table = $table;
		$this->id = $id;
		$this->model = $model;
	}

	// save function
	public function save($model) {

		$item = $model->getProperties();

		$list = [];
		$cols = [];

		if (in_array('id', $item) == '') {
			unset($item['id']);
		}
		elseif (in_array('id', $item) !== ''){
			return $item['id'];
		}

		foreach ($item as $key => $value) {
			array_push($list, ':' . $key);
		}

		foreach (array_keys($item) as $c) {
			array_push($cols, $c);
		}

		$cols = implode(', ', array_keys($item));
		$val = implode(',', $list);

		if (in_array('id', $item) == '') {
			$sql = "INSERT INTO {$this->table}({$cols}, created_at, updated_at)
			VALUES ({$val}, now(), now())";
			$result = Database::getBdd()->prepare($sql);
			
			$req = $result->execute(array_merge($item));
			
			return $req;
		}
	}

	// update function
	public function update($model) {
		
		$item = $model->getProperties();

		$id = $item['id'];
		$title = $item['title'];
		$des = $item['description'];

		if (in_array('id', $item) !== '') {

			$sql = "UPDATE {$this->table}
			SET title = '$title', description = '$des', updated_at = now() WHERE id = $id" ;
			$result = Database::getBdd()->prepare($sql);

			$req = $result->execute();

			return $req;
		}
	}

	// getElementById function
	public function get($id) {

		// prepare sql command to execute getElementById
		$sql = "SELECT * FROM {$this->table} WHERE id = ?";
		$result = Database::getBdd()->prepare($sql);
		$result->execute([$id]);
		
		return $result->fetch(PDO::FETCH_OBJ);

		// $class = get_class($this->model);
		// $result->setFetchMode(PDO::FETCH_INTO, new $class);
	}

	// get all of data from db - create getAll function
	public function getAll($model) {

		$properties = implode(',', array_keys($model->getProperties()));
		$sql = "SELECT {$properties} FROM {$this->table}";
		$result = Database::getBdd()->prepare($sql);
		$result->execute();

		return $result->fetchAll(PDO::FETCH_OBJ);
	}

	// create delete function
	public function delete($id) {

		$sql = "DELETE FROM {$this->table} WHERE id = $id";
		$req = Database::getBdd()->prepare($sql);

		// return result executed
		return $req->execute();
	}
}
