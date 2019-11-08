<?php

use App\Http\Controllers\MessagesController;
use PHPunit\Framework\TestCase;
class MessagesControllerTest extends TestCase
{
    function setUp()
    {
         $this->messages = Mockery::mock('App\Repositories\MessagesInterface');
        $this->view = Mockery::mock('Illuminate\view\Factory');
        $this->controller = new MessagesController($this->messages, $this->view);
    }
    function tearDown()
    {
        Mockery::close();
    }
    public function testIndex()
    {
        $this->messages->shouldReceive('getPaginated')->once()->andReturn('paginated_messages');
        $this->view->shouldReceive('make')->with('messages.index', ['messages'=>'paginated_messages'])->once();
        $this->controller->index();
    }

    function testCreate()
    {

        $this->view->shouldReceive('make')->with('messages.create')->once();
        $this->controller->create();
    }

    function testStore()
    {
        $request = Mockery::mock('Illuminate\Http\Request');
        $this->messages->shouldReceive('store');
        $this->controller->store($request);
    }
}
