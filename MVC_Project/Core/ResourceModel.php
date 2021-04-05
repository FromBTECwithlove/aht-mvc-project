<?php

namespace MVC_Project\Core;

use MVC_Project\Config\Database;
use PDO;

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

	// save function
	public function save($model)
	{
		$item = $model->getProperties();

		$listInsert = [];
		$listUpdate = [];
		$cols = [];

		$condition = $model->getId();

		if ($condition === null)
		{
			foreach (array_keys($item) as $c)
			{
				array_push($cols, $c);
			}

			foreach ($item as $key => $value)
			{
				array_push($listInsert, ':' . $key);
			}

			$cols = implode(', ', array_keys($item));
			$listInsert = implode(', ', $listInsert);

			$sql = "INSERT INTO {$this->table}({$cols}, created_at, updated_at)
			VALUES ({$listInsert}, now(), now())";
			$result = Database::getBdd()->prepare($sql);
			
			$req = $result->execute(array_merge($item));
			
			return $req;
		}
		else
		{
			foreach ($item as $key => $value)
			{
				array_push($listUpdate, $key . ' = :' . $key);
			}

			$val = implode(', ', $listUpdate);

			$sql = "UPDATE {$this->table} SET {$val}, updated_at = now() WHERE id = :id" ;
			$result = Database::getBdd()->prepare($sql);

			$req = $result->execute($item);

			return $req;
		}
	}

	// getElementById function
	public function get($id)
	{
		// prepare sql command to execute getElementById
		$sql = "SELECT * FROM {$this->table} WHERE id = ?";
		$result = Database::getBdd()->prepare($sql);
		$result->execute([$id]);
		
		return $result->fetch(PDO::FETCH_OBJ);
	}

	// get all of data from db - create getAll function
	public function getAll($model)
	{
		$key = $model->getProperties();
		$item = implode(',', array_keys($key));
		$sql = "SELECT {$item} FROM {$this->table}";
		$result = Database::getBdd()->prepare($sql);
		$result->execute();

		return $result->fetchAll(PDO::FETCH_OBJ);
	}

	// create delete function
	public function delete($id)
	{
		$sql = "DELETE FROM {$this->table} WHERE id = ?";
		$req = Database::getBdd()->prepare($sql);

		// return result executed
		return $req->execute([$id]);
	}
}
