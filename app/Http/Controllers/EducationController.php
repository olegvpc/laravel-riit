<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Education;

class EducationController extends Controller
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
        // test on unknown user id
        // $users_list = (object) [
        //     '1' => 'John',
        //     '2' => 'Samm',
        //     '3' => 'Doo',
        // ];

        return view('education.create', compact('users_list'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'education' => ['required', 'string', 'min:1', 'max:50'],
            'id' => ['required', 'string', 'exists:users,id', 'unique:education,user_id']
        ]);

       $educatoin_record = Education::query()->firstOrCreate([
            'user_id' => $validated['id'], // первого попавшего юзера
            'education' => $validated['education'],
        ],
        []);

        if($educatoin_record->education === $validated['education']) {
            alert(__("Создана новая запись образования: $educatoin_record->education!"), 'primary');
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
