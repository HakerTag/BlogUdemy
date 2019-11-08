<?php

namespace Tests\Feature\functional;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateMessageTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;
    /**@test */
    public function a_guest_user_can_send_message()
    {
        $this->withoutEvents();
        //Entonces
        //Cuando visitamos 'messages/create' y enviamos un mensaje
        $this->get('mensajes/create');
        $this->post('Daniel', 'nombre');
        $this->post('daniel@email.com', 'email');
        $this->post('Mensaje de Prueba', 'mensaje');
        $this->press('Guardar');4

        //Entonces el mensaje debe estar en la Base de datos
        $this->seeInDatabase('messages', [
            'nombre' => 'daniel',
            'email' => 'daniel@email.com',
            'mensaje' => 'Hola soy Daniel'
        ]);
    }

     /**@test */
    public function a_registered_user_can_send_message()
    {
        $this->withoutEvents();

        //Teniendo un Usuario registrado
        $user = factory(User::class)->create();

        //Login de usuario
        $this->actingAS($user);

        //Cuando visitamos 'messages/create' y enviamos un mensaje
        $this->get('mensajes/create');
        // $this->post('Daniel', 'nombre');
        // $this->post('daniel@email.com', 'email');
        $this->post('Mensaje de Prueba', 'mensaje');
        $this->press('Guardar');4

        //Entonces el mensaje debe estar en la Base de datos
        $this->seeInDatabase('messages', [
            'nombre' => null,
            'email' => null,
            'mensaje' => 'Hola soy Daniel',
            'user_id' => $user->id
        ]);
    }
}
