<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, HasUuids;


    protected $fillable = [
        'name',
        'slug',
        'uuid'
    ];

    protected $hidden = [
        // 'id'
    ];


    // public function getRouteKeyName(){
    //     return 'uuid';
    // }

    public function notes(){
        return $this->hasMany(Note::class);
    }

}
