<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\User;
class vocabulary extends Model
{
	use softDeletes;

    protected $fillable=['user_id','name','sentence','mean','id'];
	protected $dates=['deleted_at'];
    public $timestamps=false;

    public function vocaUser(){
    	return $this->belongsTo('User','user_id','id');
    }

}
