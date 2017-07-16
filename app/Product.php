<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'photo', 'name', 'description',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
