<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function registerAsist($id){
        $asiste = Event::findOrFail($id);
        // El whereDoesntHave permite aplicar una condicion a una relacion
        $users = User::whereDoesntHave('attendedEvents', function($query) use ($asiste) {
            $query->where('event_id', $asiste->id);
        })->get();

        return view('registerAsist', compact('asiste', 'users'));
    }
    
    public function storeAttendee(Request $request, $idEvent){
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);
    
        $user = User::findOrFail($validatedData['user_id']);
        $event = Event::findOrFail($idEvent);
    
        $user->attendedEvents()->attach($event);
    
        return redirect()->route('show', $idEvent);
    }

    public function editar($id){
        // El findOrFail arrojará una excepción si no se encuentra el evento correspondiente(id)
        $editEvent = Event::findOrFail($id); 
        return view('editar', compact('editEvent'));
    }
    
    public function update(Request $request, $id){
        $event = Event::findOrFail($id);
        $event->title = $request->input('nombre');
        $event->date = $request->input('fecha');
        $event->description = $request->input('descripcion');
        $event->location = $request->input('location');
        $event->save();

        return redirect()->route('events');
    }
    
    public function destroy($id) {
        try {
            $event = Event::findOrFail($id);
            $event->attendees()->detach();
            $event->delete();
            session()->flash('message', 'Evento eliminado correctamente');
            return redirect()->route('events');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => 'No se puede eliminar el evento']);
        }
    }
    
 
}
