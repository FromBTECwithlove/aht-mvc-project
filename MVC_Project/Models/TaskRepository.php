<?php

namespace MVC_Project\Models;

use MVC_Project\Models\TaskResourceModel;


class TaskRepository {

	private $taskResourceModel;

	// **********************FUNCTION**********************
	public function __construct()
	{
		$this->taskResourceModel = new TaskResourceModel();
	}

	public function add($model)
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

	public function getAll($model)
	{
		return $this->taskResourceModel->getAll($model);
	}
}
