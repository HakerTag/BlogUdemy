<?php

namespace Tests\Feature\integration;

use App\Repositories\Messages;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class EloquentMessagesTest extends TestCase
{
	use DatabaseMigrations;
	/**@before */
	function create_new_repo_instance()
	{
		$this->repo = new Messages;
	}
    /**@test*/
    public function it_returns_paginated_messages()
    {
        //given - Teniendo más de 10 mensajes
        $messages = factory(Messages::class, 15)->create(['created_at' => Carbon::yesterday()]);
        $latestMessages =factory(Messages::class)->create(['created_at' => Carbon::now()]);

        //when - Cuando ejecutamos el metodo getPaginated
        $result = $this->repo->getPaginated();

        //then -Entonces debemos obtener 10 de los mensajes
        $this->assertEquals($result->count(), 10);

        //debemos recibir una instancia del paginador de laravel
        $this->assertTrue($result instanceof Paginator);

        //Los mensajes esten ordenados en forma de creacion en orden descendente
        $this->assertEquals($result->first()->id, $latestMessages->id);

        //Verificar que se carguen las relaciones
        $this->assertTrue($result->first()->relationLoaded('user'));
        $this->assertTrue($result->first()->relationLoaded('notes'));
        $this->assertTrue($result->first()->relationLoaded('tags'));
    }

    /**@test*/
    function it_stores_a_message_in_a_database()
    {
    	//Teniendo un mensaje para guardar
    	$request = new Request([
    		'nombre' => 'Daniel',
    		'email' => 'daniel@email.com',
    		'mensaje' => 'Hola soy Daniel'
    	]);

    	//Cuando ejecute el metodo store
    	$this->repo->store($request);

    	//Entonces el mensaje debe aparecer en la base de datos
    	$this->seeInDatabase('messages', [
    		'nombre' => 'Daniel',
    		'email' => 'daniel@email.com',
    		'mensaje' => 'Hola soy Daniel'
    	]);
    }
     /**@test*/
     function a_register_user_can_store_a_message()
     {
     	//Teniendo un usuario y un mensaje para guardar
     	$user = factory(User::class)->create();
		$request = new Request(['mensaje' => 'Hola soy Daniel'
    	]);

    	//login de usuario (simulado)
		$this->actinAs($user);

     	//Cuando Ejecutemos el metodo store
		$this->repo->store($request);

     	//Entonces el Mensaje debe aparecer con el usuarios relacionado
     	$this->seeInDatabase('messages', [
     		'nombre' => null,
     		'email' => null,
     		'mensaje' => 'Hola soy Daniel',
     		'user_id' => $user->id,
     	]);
     }

     /**@test */
     function it_returns_a_message_by_id()
     {
     	//Teniendo un mensaje en la base de datos
     	$meessage = factory(Message::class)->create();

     	//Cuando ejecuto el metodo findById
     	$result = $this->repo->findById($message->id);


     	//Entonces debemos obtener el mensaje correcto
     	$this->assertEquals($result->id, $message->id);
     }

     /**@test */
     function it_update_a_message()
     {
     	//Teniendo un mensaje en la base de datos para modificarlo
     	$meessage = factory(Message::class)->create();
     	$request = Request(['mensaje' => 'Mensaje actualizado']);

     	$this->seeInDatabase('messages', [
     		'nombre' => $message->nombre,
     		'email' => $message->email,
     		'mensaje' => $mensaje->mensaje,]);

     	//Cuando ejecuto el metodo findById
     	$result = $this->repo->update($request, $message->id);


     	//Entonces en la base de datos debe estar actualizado
     	$this->seeInDatabase('messages', [
     		'nombre' => $message->nombre,
     		'email' => $message->email,
     		'mensaje' => 'Mensaje actualizado',]);
     }

     /**@test */
     function it_deletes_a_message_by_id()
     {
     	//Teniendo un mensaje en la base de datos
     	$meessage = factory(Message::class)->create();

     	$this->seeInDatabase('messages', [
     		'nombre' => $message->nombre,
     		'email' => $message->email,
     		'mensaje' =>$message->mensaje,]);
     	//Cuando ejecuto el metodo destroy
     	$result = $this->repo->destroy($message->id);


     	//Entonces no debemos ver el mensaje en la bd
     	$this->dontSeeInDatabase('messages', [
     		'nombre' => $message->nombre,
     		'email' => $message->email,
     		'mensaje' =>$message->mensaje,]);
     }
}
