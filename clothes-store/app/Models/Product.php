<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="products";
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    //One to Many
    public function listProductImage(){
        return $this->hasMany(ProductImage::class);
    }
    //Many to Many
    // public function tags()
    // {
    //     return $this->morphToMany(Tag::class, 'product_tags');
    // }
    public function tags(){
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')->withTimestamps();
    }
    public function productTaxonomyAttributes(){
        return $this->belongsToMany(TaxonomyAttribute::class, 'product_taxonomy_attributes', 'product_id', 'taxonomy_attribute_id')->withTimestamps();
    }

}
