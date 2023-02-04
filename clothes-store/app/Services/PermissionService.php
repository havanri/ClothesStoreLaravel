<?php
namespace App\Services;

use App\Models\Permission;

class PermissionService extends BaseService{
    public function __construct(Permission $model){
        $this->model = $model;
    }

}