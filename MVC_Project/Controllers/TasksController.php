<?php

namespace MVC_Project\Controllers;

use MVC_Project\Core\Controller;
use MVC_Project\Models\TaskRepository;
use MVC_Project\Models\TaskModel;
use MVC_Project\Models\Task;

class TasksController extends Controller
{
    private $taskRepository;

    public function __construct()
    {
        $this->taskRepository = new TaskRepository();
    }

    public function index()
    {

        // $tasks = new Task();
        // $d['tasks'] = $tasks->showAllTasks();

        $d['tasks'] = $this->taskRepository->getAll();

        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        // extract($_POST);

        // if (isset($title) && !empty($title) && isset($description) && !empty($description))
        // {
        //     $taskModel = new TaskModel();

        //     $taskModel->title = $title;
        //     $taskModel->description = $description;

        //     if ($this->taskRepository->add($taskModel))
        //     {
        //         header("Location: " . WEBROOT . "tasks/index");
        //     }
        // }

        // $this->render("create");

        extract($_POST);

        if (isset($title) && !empty($title) && isset($description) && !empty($description))
        {
            $taskModel = new TaskModel();

            $taskModel->setTitle($title);

            $taskModel->setDescription($description);

            if ($this->taskRepository->add($taskModel))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->render("create");
    }

    function edit($id)
    {

        extract($_POST);

        $d["tasks"] = $this->taskRepository->get($id);

        if (isset($_POST["title"]))
        {
            if ($this->taskRepository->edit($id, $_POST["title"], $_POST["description"]))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        if ($this->taskRepository->delete($id))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>