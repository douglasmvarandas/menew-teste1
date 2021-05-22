<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = DB::select('
                    SELECT
                        people.id, people.name, people.phone, people.email, cities.name as city, cities.country as country, categories.name as category
                    FROM
                        people
                    JOIN
                        (
                            SELECT
                                cities.id as id, cities.name as name, countries.name as country
                            FROM
                                cities
                            JOIN
                                countries
                            ON
                                cities.country_id = countries.id
                        ) as cities
                    ON
                        people.city_id = cities.id
                    JOIN
                        categories
                    ON
                        people.category_id = categories.id;
                ');

        return Inertia::render('People/Index', [
            "people" => $people
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('People/Form', [
            "cities" => City::all(),
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:5',
            'phone' => 'required|numeric|unique:people',
            'email' => 'required|email|unique:people',
            'city' => 'required|numeric',
            'category' => 'required|numeric',
        ]);

        People::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'city_id' => $validated['city'],
            'category_id' => $validated['category'],
        ]);

        return redirect()->route('people.index')->with('message', 'People added succefully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\$id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Inertia::render('People/Form', [
            "person" => People::find($id),
            "cities" => City::all(),
            "categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\$id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $people = People::find($id);

        if ($request->name != $people->name)
        {
            $validated = $request->validate(['name' => 'required|string|min:5']);
            $people->name = $validated['name'];
        }
        if ($request->phone != $people->phone)
        {
            $validated = $request->validate(['phone' => 'required|numeric|unique:people']);
            $people->phone = $validated['phone'];
        }
        if ($request->email != $people->email)
        {
            $validated = $request->validate(['email' => 'required|email|unique:people']);
            $people->email = $validated['email'];
        }
        if ($request->city != $people->city_id)
        {
            $validated = $request->validate(['city' => 'required|numeric']);
            $people->city_id = $validated['city_id'];
        }
        if ($request->category != $people->category_id)
        {
            $validated = $request->validate(['category' => 'required|numeric']);
            $people->category_id = $validated['category_id'];
        }

        $people->save();

        return redirect()->route('people.index')->with('message', 'People updated succefully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\$id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $people = People::find($id);

        $people->delete();

        return redirect()->route('people.index')->with('message', 'People deleted succefully.');
    }
}
