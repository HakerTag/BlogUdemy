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

	public function note()	
	{
		return $this->morphOne(Note::class, 'notable');
	}

	public function tags()
	{
		return $this->morphToMany(Tag::class, 'taggable');
	}

	public function userName()
	{
		# code...
	}

	public function userEmail()
	{
		# code...
	}
}


