<?php 

namespace MVC_Project\Models;

use MVC_Project\Core\Model;

/**
 *
 */
class TaskModel extends Model
{
	protected $id;
	protected $title;
	protected $description;

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
}
?>