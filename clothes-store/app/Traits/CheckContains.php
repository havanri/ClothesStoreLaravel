<?php

namespace App\Traits;

trait CheckContains{
    
    public function findAllWithId($objects, $id) {
        return array_filter($objects, function($toCheck) use ($id) { 
            return $toCheck->id == $id; 
        });
    }
}