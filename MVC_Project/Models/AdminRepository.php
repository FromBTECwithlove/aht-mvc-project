<?php

namespace MVC_Project\Models;

use MVC_Project\Models\AdminResourceModel;

class AdminRepository
{
    private $adminResourceModel; 

    public function __construct()
    {
        $this->adminResourceModel = new AdminResourceModel();
    }

    public function show($model)
    {
        return $this->adminResourceModel->getAll($model);
    }
}
