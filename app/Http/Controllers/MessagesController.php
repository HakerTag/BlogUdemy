<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Events\MessageWasReceived;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\CreateMessageRequest;


class MessagesController extends Controller
{

    function __construct()
    {
        $this->middleware('auth',['except' => ['create', 'store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $key = "messages.page." . request('page', 1);

       $messages = Cache::rememberForever($key, function(){
              return  Message::with(['user', 'note', 'tags'])
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->paginate(10);
        });
      
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
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
        $message = Message::create($request->all());
        if (auth()->check()) 
        {
            auth()->user()->messages()->save($message);
        }

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
        $message = Cache::rememberForever("messages.{$id}", function() use ($id){
            return Message::findOrFail($id);
        });

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
        $message = Cache::rememberForever("messages.{$id}", function() use ($id){
            return Message::findOrFail($id);
        });
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
         Message::findOrFail($id)->update($request->all());

         Cache::flush();

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
        Message::findOrFail($id)->delete();

        Cache::flush();

        return redirect()->route('mensajes.index');
    }
}
