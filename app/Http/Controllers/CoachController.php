<?php

namespace App\Http\Controllers;
use App\Club;
use Illuminate\Http\Request;
use App\Coach;

class CoachController extends Controller
{
    public function index()
    {
        return Coach::all();
    }

    public  function  store(Request $request)
    {
        return Coach::create($request->all());;
    }

    public function show($id)
    {
        return Coach::find($id);
    }

    public function update(Request $request, $id)
    {
        $coach = Coach::find($id);
        $coach->update($request->all());
        return $coach;
    }

    public function destroy($id)
    {
        return Coach::destroy($id);//
    }

    public function search($name)
    {
        return  Coach::where('name','like','%'.$name.'%')->get();
    }

}
