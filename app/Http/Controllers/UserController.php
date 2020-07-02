<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index() {
        $utilizatori = \DB::table('users')->get();
        $userLogat = auth()->user();
        return view('utilizatori.index')->with([
            'utilizatori' => $utilizatori,
            'userLogat' => $userLogat,
        ]);
    }

    public function edit($id) {
        $utilizator = User::find($id);
        return view('utilizatori.edit')->with('utilizator', $utilizator);
        }

    public function update(Request $request, $id) {
    $rules = array(
    'name' => 'required',
    'fullname' => 'required',
    'email' => 'required',
    'type' => 'required',
    );
    $validator = \Validator::make($request->all(), $rules);

        // process the login
    if ($validator->fails()) {
    return \Redirect::to('utilizatori')
    ->withErrors($validator)
    ->withInput(request()->except('password'));
    } else {
        // store
        $utilizator = User::find($id);
        $utilizator->name = $request->get('name');
        $utilizator->fullname = $request->get('fullname');
        $utilizator->email = $request->get('email');
        $utilizator->type = $request->get('type');
        $utilizator->save();

        // redirect
        Session::flash('message', 'Utilizator modificat cu success!');
        return Redirect::to('utilizatori');
    }
}

    public function destroy($id) {
        $utilizator = User::find($id);
        $utilizator->delete();

        Session::flash('message', 'Utilizator sters cu success');
        return Redirect::to('utilizatori');

    }



}
