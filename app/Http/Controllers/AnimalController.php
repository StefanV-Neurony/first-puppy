<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Image;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AnimalController extends Controller
{
    public function index()
    {
        $animale = \DB::table('animals')->get();
        $user = auth()->user();
        return view('animale.index')->with([
            'animale' => $animale,
            'utilizator' => $user,

        ]);
    }

    public function create()
    {
        return view('animale.create');
    }

    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'age' => 'required|numeric',
            'sex' => 'required',
            'breed' => 'required',
            'size' => 'required',
            'color' => 'required',
            'type' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
        );
        $validator = \Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return \Redirect::to('animale/create')
                ->withErrors($validator)
                ->withInput(request()->except('password'));
        } else {
            // store
            $animal = new Animal();
            $animal->name = $request->get('name');
            $animal->age = $request->get('age');
            $animal->sex = $request->get('sex');
            $animal->breed = $request->get('breed');
            $animal->size = $request->get('size');
            $animal->color = $request->get('color');
            $animal->type = $request->get('type');
            $animal->description = $request->get('description');
            $animal->price = $request->get('price');
            $animal->save();
            $image = new Image;

            if ($request->file('photo')) {
                $imagePath = $request->file('photo');
                $imageName = $request->get('name') . '.' . $imagePath->getClientOriginalExtension();
                $path = $request->file('photo')->storeAs('uploads', $imageName, 'public');
            }

            $image->id = $animal->id;
            $image->name = $imageName;
            $image->path = '/storage/'.$path;
            $image->save();

            // redirect
            \Session::flash('message', 'Animal creat cu success!');
            return Redirect::to('animale');
        }
    }

    public function show($id) {
        $animal = Animal::find($id);
        $imagine = Image::find($id);
        return view('animale.show')->with([
            'animal' => $animal,
            'imagine' => $imagine,
        ]);
    }

    public function edit($id) {
        $animal = Animal::find($id);
        $image = Image::find($id);
        return view('animale.edit')->with(
            [
                'animal' => $animal,
                'image' => $image,
            ]);
    }

    public function update(Request $request, $id)
    {

        $rules = array(
            'name' => 'required',
            'age' => 'required|numeric',
            'sex' => 'required',
            'breed' => 'required',
            'size' => 'required',
            'color' => 'required',
            'type' => 'required',
            'description' => 'required',
            'photo' => 'max:4096',
            'price' => 'required|numeric',

        );
        $validator = \Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return \Redirect::to('animale/create')
                ->withErrors($validator)
                ->withInput(request()->except('password'));
        } else {
            // store
            $animal = Animal::find($id);
            $animal->name = $request->get('name');
            $animal->age = $request->get('age');
            $animal->sex = $request->get('sex');
            $animal->breed = $request->get('breed');
            $animal->size = $request->get('size');
            $animal->color = $request->get('color');
            $animal->type = $request->get('type');
            $animal->description = $request->get('description');
            $animal->status = $request->get('status');
            $animal->price = $request->get('price');
            $animal->save();

            $image = Image::find($id);
            $image->name = $request->get('name') . '.jpg';
            $image->path = '/storage/uploads/' . $image->name;
            $image->save();
            // redirect
            Session::flash('message', 'Animal modificat cu success!');
            return Redirect::to('animale');
        }
    }

    public function destroy($id){
        $animal = Animal::find($id);
        $animal->delete();

        Session::flash('message', 'Animal sters cu success');
        return Redirect::to('animale');
    }
}
