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
            'link' => 'required|string',
        ]);

        $event = Event::whereLinking($event->linking)->get();
        if (!$event) {
            Alert::toast('Le cours souhaité n\'existe pas');
            return back();
        }elseif (is_null($event->end_at)) {
            Alert::toast('Le cours souhaité est déjà passé');
            return back();
        }

        Alert::toast('Bienvenue au cours');
        return redirect()->route('course.classroom');
    }

    public function classroom($link)
    {
        $event = Event::whereLinking($link)->get();
        return view('classroom', [
            'event' => $event,
        ]);
    }

}
