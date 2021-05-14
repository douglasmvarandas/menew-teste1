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

    public function getAll()
    {
        return responder()->success(Contact::all())->respond();
    }

    public function add(Request $request)
    {

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'city' => $request->city,
            'state' => $request->state,
            'category' => $request->category,
        ]);

        return responder()->success($contact)->respond();

    }
}