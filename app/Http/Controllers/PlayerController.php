<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PlayerController extends Controller
{
    public function index()
    {
        return Player::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required',
            'name' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'age' => 'required',
            'position' => 'required',
            'club_id' =>'required'



        ]);
        return Player::create($request->all());

    }

    public function show($id)
    {
        return Player::find($id);
    }

    public function update(Request $request, $id)
    {
        $player = Player::find($id);
        $player->update($request->all());
        return $player;
    }

    public function destroy($id)
    {
        return Player::destroy($id);//
    }

    public function search($name)
    {
        return  Player::where('name','like','%'.$name.'%')->get();
    }

}
