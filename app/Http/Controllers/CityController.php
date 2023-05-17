<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users_list = (object)[];

        $users = User::all()->toArray();

        foreach ($users as $user) {
            $users_list->{$user['id']} = $user['name'];
        };

        return view('cities.create', compact('users_list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            // 'city' => ['required', 'string', 'min:1', 'max:50', 'unique:cities,city'],
            'city' => ['required', 'string', 'min:1', 'max:50'],
            'id' => ['required', 'string', 'exists:users,id']
        ]);
        // dd($validated);
       $city_record = City::query()->firstOrCreate([
            'city' => $validated['city'],
            'user_id' => $validated['id'],
        ],
        []);

        if($city_record->city === $validated['city']) {
            alert(__("Создана новая запись города: $city_record->city!"), 'primary');
        };

        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
