<?php

namespace MVC_Project\Controllers;

use MVC_Project\Models\AdminRepository;
use MVC_Project\Core\Controller;
use MVC_Project\Models\AdminModel;
// use MVC_Project\Models\AdminResourceModel;

class AdminController extends Controller
{
    private $adminRepository;
    private $adminResourceModel;

    public function __construct()
    {
        $this->adminRepository = new AdminRepository();
        // $this->adminResourceModel = new AdminResourceModel();
        
    }

    public function index()
    {
        $model = new AdminModel();
        // $d['admin'] = $this->adminResourceModel->getAll($model);
        $d['admin'] = $this->adminRepository->show($model);
        $this->set($d);
        $this->render('index');
    }
}
