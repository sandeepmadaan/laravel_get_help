<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('\App\User');
    }    
}