<?php

namespace MVC_Project\Controllers;

use MVC_Project\Core\Controller;
use MVC_Project\Models\TaskRepository;
use MVC_Project\Models\TaskModel;

/**
 * TasksController
 * extends from Controller class
 * @var taskRepository
 * 
 */

class TasksController extends Controller
{
    private $taskRepository;

    // __construct function
    public function __construct()
    {
        // create new TaskRepository object
        $this->taskRepository = new TaskRepository();
    }

    // index function to show all of data to screen
    public function index()
    {
        $model = new TaskModel(); 
        $d['tasks'] = $this->taskRepository->getAll($model);
        $this->set($d);
        $this->render("index");
    }

    // create function
    function create()
    {

        // extract($_POST); //Treat keys as variable names and values as variable values
        if (isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['description']))
        {
            $this->model = new TaskModel();
            
            $this->model->setId('');
            $this->model->setTitle($_POST['title']);
            $this->model->setDescription($_POST['description']);

            if ($this->taskRepository->add($this->model))
            {
                header("Location: " . WEBROOT . "Tasks/index");
            }
        }

        $this->render("create");
    }

    // edit function
    function edit($id)
    {

        $d['tasks'] = $this->taskRepository->get($id);
        
        if (isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['description']))
        {
            /**
             * [$model description]
             * @var model
             */
            
            $this->model = new TaskModel();

            $this->model->setId($id);
            $this->model->setTitle($_POST['title']);
            $this->model->setDescription($_POST['description']);

            if ($this->taskRepository->update($this->model))
            {
                header("Location: " . WEBROOT . "Tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    // delete function
    function delete($id)
    {
        // the condition for the delete action
        if ($this->taskRepository->delete($id))
        {
            // recdirect to index page
            header("Location: " . WEBROOT . "Tasks/index");
        }
    }
}
