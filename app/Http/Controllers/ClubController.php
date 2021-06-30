<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;


class ClubController extends Controller
{
    public function index()
    {
        return Club::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'area' => 'required',

        ]);
        return Club::create($request->all());

    }

    public function show($id)
    {
        return Club::find($id);
    }

    public function update(Request $request, $id)
    {
        $player = Club::find($id);
        $player->update($request->all());
        return $player;
    }

    public function destroy($id)
    {
        return Club::destroy($id);//
    }

    public function search($name)
    {
        return Club::where('name', 'like', '%' . $name . '%')->get();
    }

}

