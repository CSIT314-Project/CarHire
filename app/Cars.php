<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    //
	//    protected $table = 'cars';
    protected $fillable = ['make','model','year','odometer','type','photo','transmission','owner','rate','description','city','mon','tue','wed','thu','fri','sat','sun']; 
}
