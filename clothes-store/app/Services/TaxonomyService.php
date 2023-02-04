<?php
namespace App\Services;

use App\Models\TaxonomyAttribute;

class TaxonomyService extends BaseService{
    public function __construct(TaxonomyAttribute $model){
        $this->model = $model;
    }

}