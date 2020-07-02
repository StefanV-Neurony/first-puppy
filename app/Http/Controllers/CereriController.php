<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Request;
use App\User;
use Illuminate\Http\Request as RequestHTTP;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PharIo\Manifest\RequiresElementTest;

class CereriController extends Controller
{
    public function index() {
        $cereri = \DB::table('requests')->where('status', null)->get();
        $users = \DB::table('users')->get();
        return view('cereri.index')->with([
            'cereri' => $cereri,
            'users' => $users,
        ]);
    }

    public function create($id) {
        $animal = Animal::find($id);
        $utilizator = auth()->user();
        return view('cereri.create')->with([
            'animal' => $animal,
            'utilizator' => $utilizator,
        ]);
    }

    public function store(RequestHTTP $request) {
        $cerere = new Request();
        $cerere->userid = auth()->user()->id;
        $cerere->animalid = $request->get('animalid');
        $cerere->animalname = $request->get('animalname');
        $cerere->animaldescription = $request->get('animaldescription');
        $cerere->surveyanswer = json_encode($request->all());
        $cerere->save();
        Session::flash('message', 'Cerere adaugata cu success');
        return Redirect::to('cererile-mele');
    }

    public function show($id) {
        $cerere = Request::find($id);
        $animal = Animal::find($cerere->animalid);
        return view('cereri.show')->with([
            'cerere' => $cerere,
            'animal' => $animal,
            ]);
    }

    public function edit($id) {
        $cerere = Request::find($id);
        $animal = Animal::find($cerere->animalid);
        return view('cereri.edit')->with([
            'cerere' => $cerere,
            'animal' => $animal,
        ]);
    }

    public function update(RequestHTTP $request, $id) {
        $cerere = Request::find($id);
        $cerere->surveyanswer = json_encode($request->all());
        $cerere->save();
        Session::flash('message', 'Cerere adaugata cu success');
        return Redirect::to('cererile-mele');
    }

    public function destroy($id)
    {
        $cerere= Request::find($id);
        $cerere->delete();

        Session::flash('message', 'Cerere stearsa cu success');
        return Redirect::to('cererile-mele');
    }

    public function cereriuser() {

        $cereri = \DB::table('requests')->where('userid', auth()->user()->id)->get();
        return view('cereri.index_personal')->with('cereri', $cereri);
    }

    public function aproba($id) {
        $cerere = Request::find($id);
        $animal = Animal::find($cerere->animalid);
        $animal->status = "1";
        $cerere->status = "1";
        $cerere->save();
        $animal->save();
        Session::flash('message', 'Cerere aprobata cu success');
        return Redirect::to('cererile-mele');
    }

    public function downloadPDF($id) {
        $cerere = Request::find($id);
        $animal = Animal::find($cerere->animalid);
        $utilizator = User::find($cerere->userid);

        $pdf = \PDF::loadView('pdf', compact([
            'cerere',
            'animal',
            'utilizator',
        ]));

        return $pdf->download($cerere->created_at .' contract '. $cerere->id . '_' . $cerere->animalname . '.pdf');
    }

    public function rapoarte() {
        $cereri = Request::all();
        return view('cereri.rapoarte')->with('cereri', $cereri);
    }
}
