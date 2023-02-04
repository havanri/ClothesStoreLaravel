<?php
namespace App\Services;

use App\Models\Slider;

class SliderService extends BaseService{
    public function __construct(Slider $model){
        $this->model = $model;
    }

}