<?php 

namespace App\Repositories;

interface MessagesInterface
{
	public function getPaginated();

	public function store($request);

	public function FindById($id);

	public function update($request, $id);
	
	public function destroy( $id);
	

}