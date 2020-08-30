<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Products extends Model
{
    //
	
	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 
	public $timestamps = false;
	
    protected $fillable = [
        'name', 'code', 'count',
    ];
}
