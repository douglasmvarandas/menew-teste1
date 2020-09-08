<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Validator;

class ContactController extends Controller
{
    public function index() {
        // $contacts = Contact::all()->sortBy('name');
        $contacts = Contact::orderBy('name')->get();

        return $contacts;
    }

    public function show($id) {
        $contact = Contact::find($id);

        if ($contact) {
            return $contact;
        } else {
            return response()
                ->json(['error' => 'Contact not found'])
                ->setStatusCode(404);
        }
    }

    public function search(Request $request) {
        $search = $request->get('search');

        $contacts = Contact::where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('city', 'like', "%{$search}%")
                         ->orWhere('state', 'like', "%{$search}%")
                         ->orWhere('category', 'like', "%{$search}%")
                         ->orderBy('name')
                         ->get();

        return response()->json($contacts);
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'phone' => 'required',
            'email' => 'required|email',
            'state' => 'required',
            'city' => 'required',
            'category' => 'required',
        ]);

        if ($validator->fails()) {
            return response()
                ->json(['error' => $validator->errors()])
                ->setStatusCode(400);
        }


        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $state = $request->input('state');
        $city = $request->input('city');
        $category = $request->input('category');

        $contact = new Contact();
        $contact->name = $name;
        $contact->phone = $phone;
        $contact->email = $email;
        $contact->state = $state;
        $contact->city = $city;
        $contact->category = $category;
        $contact->save();

        return response()->json($contact)->setStatusCode(201);
    }

    public function update(Request $request, $id) {

        $contact = Contact::find($id);

        if ($contact) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:3',
                'phone' => 'required',
                'email' => 'required|email',
                'state' => 'required',
                'city' => 'required',
                'category' => 'required',
            ]);

            if ($validator->fails()) {
                return response()
                    ->json(['error' => $validator->errors()])
                    ->setStatusCode(400);
            }

            $name = $request->input('name');
            $phone = $request->input('phone');
            $email = $request->input('email');
            $state = $request->input('state');
            $city = $request->input('city');
            $category = $request->input('category');

            $contact->name = $name;
            $contact->phone = $phone;
            $contact->email = $email;
            $contact->state = $state;
            $contact->city = $city;
            $contact->category = $category;
            $contact->save();

            return response()->json($contact)->setStatusCode(202);

        } else {
            return response()
                ->json(['error' => 'Contact not found'])
                ->setStatusCode(404);
        }
    }

    public function delete($id) {
        $contact = Contact::find($id);

        if ($contact) {
            $contact->delete();
            return response()->json([])->setStatusCode(204);
        } else {
            return response()
                ->json(['error' => 'Contact not found'])
                ->setStatusCode(404);
        }
    }

}
