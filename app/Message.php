<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['nombre', 'email', 'mensaje','role'];

    public function user()
	{
		return $this->belongsTo(User::class);
	}

}


