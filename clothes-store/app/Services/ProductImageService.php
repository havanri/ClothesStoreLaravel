<?php
namespace App\Services;

use App\Models\ProductImage;

class ProductImageService extends BaseService{
    public function __construct(ProductImage $model){
        $this->model = $model;
    }

}