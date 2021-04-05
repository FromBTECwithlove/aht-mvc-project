<?php 

namespace MVC_Project\Models;

use MVC_Project\Core\Model;

class TaskModel extends Model
{
	protected $id;
	protected $title;
	protected $description;

	// protected $created_at;
	// protected $updated_ad;

	function __construct()
	{
		# code...
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	// public function setCreated($created_at) {
	// 	$this->created_at = $created_at;
	// }

	// public function setUpdated($updated_ad) {
	// 	$this->updated_ad = $updated_ad;
	// }

	public function getId()
	{
		return $this->id;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getDescription()
	{
		return $this->description;
	}

	// public function getCreated() {
	// 	return $this->created_at;
	// }

	// public function getUpdated() {
	// 	return $this->updated_ad;
	// }
}
