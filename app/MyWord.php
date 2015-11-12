<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyWord extends Model
{
    protected $fillable = array('user_id','word_id',);

	protected $table = 'user_word';

}
