<?php

namespace App\Http\Controllers;

use App\Event;
use App\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index()
    {
        return Tournament::all();
    }

    public function store(Request $request)
    {

        return Tournament::create($request->all());

    }

    public function show($id)
    {
        return Tournament::find($id);
    }

    public function update(Request $request, $id)
    {
        $player = Tournament::find($id);
        $player->update($request->all());
        return $player;
    }

    public function destroy($id)
    {
        return Tournament::destroy($id);//
    }

    public function search($name)
    {
        return  Tournament::where('name','like','%'.$name.'%')->get();
    }
}
