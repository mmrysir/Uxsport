<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return Event::all();
    }

    public function store(Request $request)
    {

        return Event::create($request->all());

    }

    public function show($id)
    {
        return Event::find($id);
    }

    public function update(Request $request, $id)
    {
        $player = Event::find($id);
        $player->update($request->all());
        return $player;
    }

    public function destroy($id)
    {
        return Event::destroy($id);//
    }

}
