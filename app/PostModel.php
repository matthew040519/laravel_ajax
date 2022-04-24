<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    //
	 protected $table = 'tblpost';
     protected $primaryKey = 'id';
     protected $fillable = ['title', 'body'];
}
