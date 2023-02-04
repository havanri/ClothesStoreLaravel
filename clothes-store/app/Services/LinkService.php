<?php
namespace App\Services;

use App\Models\Link;

class LinkService extends BaseService{
    public function __construct(Link $model){
        $this->model = $model;
    }

}