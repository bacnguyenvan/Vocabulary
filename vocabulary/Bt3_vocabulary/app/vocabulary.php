<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class vocabulary extends Model
{
	use softDeletes;

    protected $fillable=['name','sentence','mean','id'];
	protected $dates=['deleted_at'];
    public $timestamps=false;

}
