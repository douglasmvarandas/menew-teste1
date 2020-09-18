<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $userID = Auth::id();
        $contacts = Contact::where('user_id', $userID)->get();
        return view('dashboard', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('create-contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $userID = Auth::id();

        $types = ['Cliente', 'Fornecedor', 'Funcionário'];

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'telephone' => 'required',
            'city' => 'required',
            'state' => 'required',
            'category' => ['required', Rule::in($types)]
        ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->telephone = $request->telephone;
        $contact->email = $request->email;
        $contact->city = $request->city;
        $contact->state = $request->state;
        $contact->category = $request->category;
        $contact->user_id = $userID;

        $contact->save();

        return redirect('contacts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return mixed
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        $userID = Auth::id();

        if($contact === null){
            return response()
                ->json(['error' => 'Contact not found.'], 404);
        }
        // Only creator user can edit a contact
        return $contact->user_id === $userID ? view('show-contact', compact('contact')) : response()
            ->json(['error' => 'Unauthenticated.'], 401);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return mixed
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        $userID = Auth::id();

        return $contact->user_id === $userID ? view('edit-contact', compact('contact')) : response()
            ->json(['error' => 'Unauthenticated.'], 401);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $userID = Auth::id();

        $types = ['Cliente', 'Fornecedor', 'Funcionário'];

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'telephone' => 'required',
            'city' => 'required',
            'state' => 'required',
            'category' => ['required', Rule::in($types)]
        ]);

        $contact = Contact::find($id);

        if($contact === null){
            return response()
                ->json(['error' => 'Contact not found.'], 404);
        }

        $contact->name = $request->name;
        $contact->telephone = $request->telephone;
        $contact->email = $request->email;
        $contact->city = $request->city;
        $contact->state = $request->state;
        $contact->category = $request->category;

        $contact->save();

        return redirect('contacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
