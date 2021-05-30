<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AccessController extends Controller
{
    public function access(Request $request)
    {
        $this->validate($request, [
            'linking' => 'required|string',
        ]);

        $event = Event::whereLinking($request->linking)->get();
        
        if (!$event) {
            Alert::toast('Le cours souhaité n\'existe pas');
            return back();
        }

        Alert::toast('Bienvenue au cours');
        return redirect()->route('course.classroom', $event->first()->linking);
    }

    public function classroom(Request $request)
    {
        $event = Event::whereLinking($request->link)->get();
        
        return view('classroom', [
            'event' => $event,
        ]);
    }

}
