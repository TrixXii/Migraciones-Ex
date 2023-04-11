<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        
        $events = Event::with('user')->get();
        return view('index', compact('events'));
    }

    public function create(){
        $usersPar = User::all();
        return view('create', compact('usersPar'));
    }
    
    public function store(Request $request){
        $event = new Event;
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->location = $request->input('location');
        $event->date = $request->input('date');
        $event->user_id = $request->input('user_id');
        $event->save();
    
    
        return redirect()->route('events')->with('OK', 'Evento creado correctamente');
    }

    public function show($id){
        $event = Event::with('user')->find($id);
        
        return view('show', compact('event'));
    }
    

    public function destroy($id){
        $event = Event::findOrFail($id);
        $event->delete();
    
        return redirect()->route('events')->with('OK', 'Evento eliminado correctamente');
    }
}
