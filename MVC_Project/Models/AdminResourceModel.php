<?php
namespace MVC_Project\Models;

use MVC_Project\Core\ResourceModel;
use MVC_Project\Models\AdminModel;

class AdminResourceModel extends ResourceModel
{
    public function __construct()
    {
        $model = new AdminModel();

        parent::_init('admin', '', $model);
    }
}

