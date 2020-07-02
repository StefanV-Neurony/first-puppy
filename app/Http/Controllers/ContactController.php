<?php

namespace App\Http\Controllers;

use App\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
        public function index() {

            $contactMessages = \DB::table('contact_messages')->get();
            return view('contact.index')->with('mesaje', $contactMessages);
        }

        public function create() {
            return view('contact.create');
        }

        public function store(Request $request)
        {
            $rules = array(
                'name' => 'required',
                'contact_back' => 'required',
                'message' => 'required',
            );
            $validator = \Validator::make($request->all(), $rules);

            // process the login
            if ($validator->fails()) {
                return \Redirect::to('contact')
                    ->withErrors($validator)
                    ->withInput(request()->except('password'));
            } else {
                // store
                $contactMessage = new ContactMessage();
                $contactMessage->name = $request->get('name');
                $contactMessage->contact_back = $request->get('contact_back');
                $contactMessage->message = $request->get('message');
                $contactMessage->userid = auth()->user()->id;
                $contactMessage->save();
                // redirect
                \Session::flash('message', 'Animal creat cu success!');
                return Redirect::to('animale');
            }
        }

        public function show($id) {
            $contactMessage = ContactMessage::find($id);
            return view('contact.show')->with('mesaj', $contactMessage);
        }
        public function destroy($id) {
            $contactMessage= ContactMessage::find($id);
            $contactMessage->delete();

            Session::flash('message', 'Mesaj sters cu success');
            return Redirect::to('contact');
        }
}
