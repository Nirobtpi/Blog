<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateNews extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];

    function get_category(){
        return $this->belongsTo(NewsCategory::class,'news_category');
    }

    function get_sub_category(){
        return $this->belongsTo(NewsSubCategory::class,'news_sub_category');
    }
}
