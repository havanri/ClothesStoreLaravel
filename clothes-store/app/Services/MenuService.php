<?php
namespace App\Services;

use App\Models\Menu;

class MenuService extends BaseService{
    public function __construct(Menu $model){
        $this->model = $model;
    }

}