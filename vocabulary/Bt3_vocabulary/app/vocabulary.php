<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class vocabulary extends Model
{

    protected $fillable=['user_id','name','sentence','mean','id'];
    public $timestamps=false;

    public function vocaUser(){
    	return $this->belongsTo('User','user_id','id');
    }

}
