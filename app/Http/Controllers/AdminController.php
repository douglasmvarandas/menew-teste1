<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queryCategory = DB::table('category_client')->get();
        $queryState = DB::table('state')->get();

        return view('table-register')
            ->with('category', $queryCategory)
            ->with('state', $queryState);
    }

    /**
     * Displays all bank records with status 1
     * @queryClient
     *
     * @return \Illuminate\Http\Response
     */
    public function tableJson()
    {
        $queryClient = DB::table('client')
            ->select('id_client', 'name', 'phone', 'name_city', 'name_category_client')
            ->join('category_client', 'client.id_category_client', '=', 'category_client.id_category_client')
            ->where('client.status', 1)
            ->get();
        return DataTables::of($queryClient)
            ->addColumn('action', function ($queryClient) {
                return
                    '<button onclick="viewClient(' . $queryClient->id_client . ')" class="btn btn-secondary"><i class="fas fa-eye"></i></button>' .
                    '<button onclick="editClient(' . $queryClient->id_client . ')" class="btn btn-warning"><i class="fas fa-edit"></i></i></button>' .
                    '<button onclick="deleteClient(' . $queryClient->id_client . ')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>';
            })->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $createClient = Client::create([
            'name' => $request->name,
            'name_city' => $request->city,
            'email' => $request->email,
            'phone' => $request->phone,
            'id_category_client' => $request->category,
            'id_state' => $request->state
        ]);

        return response()->json($createClient);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $queryClient = DB::table('client')
            ->select('id_client', 'name', 'phone', 'email', 'name_city', 'client.id_category_client', 'client.id_state')
            ->join('category_client', 'client.id_category_client', '=', 'category_client.id_category_client')
            ->where('client.id_client', $request->idClient)
            ->get();
        return response()->json($queryClient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $queryClient = DB::table('client')
            ->select('id_client', 'name', 'phone', 'email', 'name_city', 'client.id_category_client', 'client.id_state')
            ->join('category_client', 'client.id_category_client', '=', 'category_client.id_category_client')
            ->where('client.id_client', $request->idClient)
            ->get();
        return response()->json($queryClient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\AdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request)
    {
        $update = Client::where('id_client', $request->idClient)
            ->update([
                'name' => $request->name,
                'name_city' => $request->city,
                'email' => $request->email,
                'phone' => $request->phone,
                'id_category_client' => $request->category,
                'id_state' => $request->state
            ]);

        return response()->json($update);
    }

    /**
     * Update the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $destroyClient = Client::where('id_client', $request->idClient)
            ->update(['status' => 2]);
        return response()->json($destroyClient);
    }
}
