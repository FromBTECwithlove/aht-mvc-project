<?php

namespace MVC_Project\Models;

use MVC_Project\Models\TaskResourceModel;

/**
 * 
 */
class TaskRepository
{
	private $taskResourceModel;

	public function __construct()
	{
		$this->taskResourceModel = new TaskResourceModel();
	}

	public function add($model)
	{
		return $this->taskResourceModel->save($model);
	}

	public function edit($model)
	{
		return $this->taskResourceModel->save($model);
	}

	public function delete($id)
	{
		return $this->taskResourceModel->delete($id);
	}

	public function get($id)
	{
		return $this->taskResourceModel->get($id);
	}

	public function getAll()
	{
		return $this->taskResourceModel->getAll();
	}
}
?>