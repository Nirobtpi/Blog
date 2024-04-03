<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable=[
        'category_name',
        'created_at',
        'updated_at',
    ];
    // public $guard=[
        
    // ];


}
