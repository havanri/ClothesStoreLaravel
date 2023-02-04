<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxonomyAttribute extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="taxonomy_attributes";
    protected $guarded = [];
    protected $primaryKey = 'id';


    public function attribute(){
        return $this->belongsTo(Attribute::class);
    }
    public function productTaxonomyAttributes(){
        return $this->belongsToMany(Product::class, 'product_taxonomy_attributes', 'taxonomy_attribute_id', 'product_id')->withTimestamps();
    }
}
