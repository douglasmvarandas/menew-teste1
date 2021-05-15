<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use App\Exceptions\ApiException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Flugg\Responder\Responder;

class ContactController extends Controller
{

    private $categories = [
        'employee',
        'provider',
        'client'
    ];

    private $states = [
        'AL', 'AP', 'BA', 'CE', 'MA', 'PB', 'PE', 'PI', 'RN', 'SE'
    ];

    public function getAll()
    {
        return responder()->success(Contact::all())->respond();
    }

    public function add(Request $request)
    {

        $this->validateFields($request);

        if(!in_array($request->category, $this->categories))
            return responder()->error(500, "Escolha uma categoria válida.")->respond();
        else if(!in_array($request->state, $this->states))
            return responder()->error(500, "Estado escolhido inválido.")->respond();
        
        // check if the email is already used
        if(Contact::where('email', '=', $request->email)->exists()) {
            return responder()->error(500, "Este email já está em uso.")->respond();
        }

        // if everything is ok, then create the contact and saves it to the database
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'city' => $request->city,
            'state' => $request->state,
            'category' => $request->category,
        ]);

        // return the created contact as the response
        return responder()->success($contact)->respond();

    }

    public function edit(Request $request, $id)
    {

        $this->validateFields($request);

        if(!in_array($request->category, $this->categories))
            return responder()->error(500, "Escolha uma categoria válida.")->respond();
        else if(!in_array($request->state, $this->states))
            return responder()->error(500, "Estado escolhido inválido.")->respond();
        
        $contact = Contact::find($id);

        $contact->name     = $request->name;
        $contact->email    = $request->email;
        $contact->number   = $request->number;
        $contact->city     = $request->city;
        $contact->state    = $request->state;
        $contact->category = $request->category;

        $contact->save();

        return responder()->success($contact)->respond();

    }

    public function delete(Request $request, $id)
    {

        $contact = Contact::find($id);

        if(is_null($contact)) {
            $message = "Contact with id $id doesn't exist.";
            return responder()->error(404, $message)->respond(404);
        } else {
            $message = ['message' => "Contact {$contact->name} deleted."];
            $contact->delete();
            return responder()->success($message)->respond();
        }

    }

    private function validateFields(Request $request)
    {

        if($request->name == "")
            return responder()->error(500, "Digite um nome.")->respond();
        else if($request->email == "")
            return responder()->error(500, "Digite um email.")->respond();
        else if($request->number == "")
            return responder()->error(500, "Digite um número de telefone.")->respond();
        else if($request->city == "")
            return responder()->error(500, "Digite a cidade.")->respond();
        else if($request->state == "")
            return responder()->error(500, "Escolha o estado.")->respond();
        else if($request->category == "")
            return responder()->error(500, "Escolha uma categoria para o contato.")->respond();

    }
}