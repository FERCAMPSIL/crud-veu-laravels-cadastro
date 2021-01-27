<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $table = "carros";
    public $timestamps = true;

    protected $fillable = [
		'marca','modelo','ano','placa','fabricacao'
	];
}

