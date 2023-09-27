<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory, HasUuids;

    protected $fillable =[
        'slug',
        'name',
        'description',
        'category_id'
    ];



    public function category(){
        return $this->belongsTo(Category::class);
    }
}
