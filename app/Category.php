<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function job()
    {
        return $this->hasMany('\App\Job');
    }
    
}