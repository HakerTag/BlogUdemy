<?php

namespace App\Repositories;

class CacheMessages
{
	protected $messages;

	function __construct(Messages $messages)
	{
		$this->messages = $messages;
	}

	public function getPaginated()
	{
		$key = "messages.page." . request('page', 1);

       return Cache::rememberForever($key, function(){
              return  Message::with(['user', 'note', 'tags'])
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->paginate(10);
        });
	}

	public function store($request)
	{
		# code...
	}

	public function FindById($id)
	{
		# code...
	}

	public function update($request, $id)
	{
		# code...
	}

	public function destroy($id)
	{
		# code...
	}

}