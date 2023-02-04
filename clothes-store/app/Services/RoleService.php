<?php
namespace App\Services;

use App\Models\Role;

class RoleService extends BaseService{
    public function __construct(Role $model){
        $this->model = $model;
    }

}