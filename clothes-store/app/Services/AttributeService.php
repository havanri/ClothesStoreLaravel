<?php
namespace App\Services;

use App\Models\Attribute;

class AttributeService extends BaseService{
    public function __construct(Attribute $model){
        $this->model = $model;
    }

}