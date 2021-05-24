<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function room(Event $event, Request $request)
    {
        $this->validate($request, [
            'link' => 'required|string',
        ]);

        $event = Event::whereLink($event->link)->get();
        dd($event);
        return view('classroom', [
            'event' => $event,
        ]);
    }

    public function test(Request $request)
    {
        $this->validate($request, [
            'link' => 'required|string',
        ]);

        $event = Event::whereLink($request->link)->get();
        dd('Testing...', $event);
        return view('front.classroom', [
            'event' => $event,
        ]);
    }
}
