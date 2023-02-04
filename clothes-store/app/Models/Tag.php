<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="tags";
    protected $guarded = [];
    
    public function products(){
        return $this->belongsToMany(Product::class, 'product_tags', 'tag_id', 'product_id')->withTimestamps();
    }
}
