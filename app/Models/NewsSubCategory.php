<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsSubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];

    public function get_category_name(){
       return $this->belongsTo(NewsCategory::class,'category_id');
    }
}
