<?php
	
namespace MVC_Project\Models;

use MVC_Project\Core\ResourceModel;
use MVC_Project\Models\TaskModel;
/**
 * 
 */
class TaskResourceModel extends ResourceModel
{
	public function __construct()
	{
		$taskModel = new TaskModel();
		parent::_init('tasks', null, $taskModel);
	}
}

?>