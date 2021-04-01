<?php

namespace MVC_Project\Core;

use MVC_Project\Config\Database;
use PDO;

/**
 * 
 */
class ResourceModel implements ResourceModelInterface
{
	private $table;
	private $id;
	private $model;

	public function _init($table, $id, $model)
	{
		$this->table = $table;
		$this->id = $id;
		$this->model = $model;
	}

	public function save($model) {
		$listItem = [];
		$properties = $model->getProperties();

		if ($model->id === null) {
			unset($properties['id']);
		}

		foreach ($properties as $key => $value) {
			array_push($listItem, ':' . $key);
		}

		$columns = [];

		foreach (array_keys($properties) as $k => $v) {
			if ($v !== 'id') {
				array_push($columns, $v . ' = ' . $v);
			}
		}

		$columns = implode(',', $columns);
		$columnString = implode(',', array_keys($properties));
		$listString = implode(',', $listItem);

		if ($model->id === null) {

			$sql = "INSERT INTO {$this->table} ({$columnString}, created_at, updated_at) VALUES ({$listString}, :created_at, :updated_at)";
			$result = Database::getBdd()->prepare($sql);
			$date = array("created_at" => date('Y-m-d H:i:s'), "updated_at" => date('Y-m-d H:i:s'));

			return $result->execute(array_merge($properties, $date));
		}
		else
		{
			$sql = "UPDATE {$this->table} SET " . $columns .', updated_at = :updated_at WHERE id = :id' ;
			$result = Database::getBdd()->prepare($sql);
			$date = array("id" => $model->id, 'updated_at' => date('Y-m-d H:i:s'));

			return $result->execute(array_merge($properties, $date));
		}
	}
	// public function save($model) {
	// 	$sql = "INSERT INTO tasks (title, description, created_at, updated_at) VALUES (:title, :description, :created_at, :updated_at)";

	// 	$req = Database::getBdd()->prepare($sql);

	// 	return $req->execute([
	// 		'title' => $title,
	// 		'description' => $description,
	// 		'created_at' => date('Y-m-d H:i:s'),
	// 		'updated_at' => date('Y-m-d H:i:s')

	// 	]);
	// }

	public function get($id) {
		// $class = get_class($this->model);
		// $sql = "SELECT * FROM {$this->table} WHERE id = :id";
		// $result = Database::getBdd()->prepare($sql);
		// $result->setFetchMode(PDO::FETCH_INTO, new $class);
		// $result->execute(['id' => $id]);

		// return $result->fetch();

		// $sql = "SELECT * FROM {$this->table} WHERE id = $id";
		// $result = Database::getBdd()->prepare($sql);
		// $result->execute();
		// return $result->fetch();
	}

	public function getAll()
	{

		// $properties = implode(',', array_keys($model->getProperties()));
		// $sql = "SELECT {$properties} FROM {$this->table}";
		// $result = Database::getBdd()->prepare($sql);

		// return $result->fetchAll(PDO::FETCH_OBJ);

		$sql = "SELECT * FROM {$this->table}";
		$result = Database::getBdd()->prepare($sql);
		$result->execute();
		return $result->fetchAll();
	}

	public function edit($id, $title, $description)
	{
		$sql = "UPDATE tasks SET title = :title, description = :description , updated_at = :updated_at WHERE id = :id";

		$req = Database::getBdd()->prepare($sql);

		return $req->execute([
			'id' => $id,
			'title' => $title,
			'description' => $description,
			'updated_at' => date('Y-m-d H:i:s')

		]);
	}

	public function delete($id)
	{
		$sql = "DELETE FROM {$this->table} WHERE id = ?";
		$req = Database::getBdd()->prepare($sql);
		return $req->execute([$id]);
	}
}
?>