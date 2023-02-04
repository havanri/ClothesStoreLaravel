<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table="attributes";
    protected $guarded = [];

    public function listTaxonomyAttributes(){
        return $this->hasMany(TaxonomyAttribute::class);
    }
}
