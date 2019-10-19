<?php

namespace App\Http\Controllers;


use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Events\MessageWasReceived;
use App\Http\Requests\CreateMessageRequest;
use App\Repositories\MessagesInterface;


class MessagesController extends Controller
{
    protected $messages; //propiedad messages
    protected $view;

    function __construct(MessagesInterface $messages, \Illuminate\Contracts\View\Factory $view)
    {
        $this->messages = $messages;
        $this->middleware('auth',['except' => ['create', 'store']]);
        $this->view = $view;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = $this->messages->getPaginated();

        return $this->view->make('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view->make('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMessageRequest $request)
    {
        //Guardar mensaje
        $message = $this->messages->store($request);

        event(new MessageWasReceived($message));
        //Esta forma sirve cuando sabemos que siempre tenemos un usuario autenticado
        // auth()->user()->messages()->create($request->all());
        // $message->user_id = auth()->id();
        // $message->save();

        return redirect()->route('mensajes.create')->with('info', 'Hemos Recibido tu mensaje');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = $this->messages->FindById($id);
        return view('messages.show',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = $this->messages->FindById($id);

        return view('messages.edit',compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateMessageRequest $request, $id)
    {
         $message = $this->messages->update($request, $id);


        return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->messages->destroy($id);

        return redirect()->route('mensajes.index');
    }
}
