<?php

namespace MVC_Project\Core;

use MVC_Project\Controllers\TasksController;

class Controller
{
    /**
     * [$vars description]
     * @var array
     */
    
    var $vars = [];
    var $layout = "default";

    function set($d)
    {
        $this->vars = array_merge($this->vars, $d);
    }

    function render($filename)
    {
        extract($this->vars);
        ob_start();

        // $filepath = str_replace('Controller', '', get_class($this));
        // $filepath = str_replace('MVC_Project\s', '', $filepath);
        // $filepath = ucfirst(str_replace('\\', '', $filepath));
        // $filepath = ROOT . '/Views/' . $filepath . '/' . $filename . '.php';
        
        // require($filepath);
        
        require(ROOT . 'Views/' . ucfirst(str_replace('MVC_Project\\s\\', '', str_replace('Controller', '', get_class($this)))) . '/' . $filename . '.php');

        $content_for_layout = ob_get_clean();

        if ($this->layout == false)
        {
            $content_for_layout;
        }
        else
        {
            require(ROOT . "Views/Layouts/" . $this->layout . '.php');
        }
    }

    private function secure_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    protected function secure_form($form)
    {
        foreach ($form as $key => $value)
        {
            $form[$key] = $this->secure_input($value);
        }
    }

}
?>