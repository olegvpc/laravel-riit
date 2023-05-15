<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = '';
        // dd($request->input('education'));

        $education_user = $request->input('education');

        // if(empty($request->all())) {
        //     $users = User::query()->orderBy('id', 'desc')->get();
        // }
        if($education_user == null) {
            $users = DB::table('users as u')->select(
                'u.id',
                'u.name',
                'e.education',
                // DB::raw("COUNT(c.city) as cities"),
                DB::raw("GROUP_CONCAT(c.city) as cities"),
            )
            ->leftjoin('education as e', 'e.user_id', '=', 'u.id')
            ->leftjoin('cities as c', 'c.user_id', '=', 'u.id')

            // ->where('u.id', $education_user)
            ->groupBy('u.id', 'e.education')
            ->orderBy('u.id', 'DESC')
            ->get();
            // dd($users);
        };
        // dump($request->all(), $request->input('education'), $users);
        // dd($users);

        return view('users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user_id)
    {
        return "Нужно показать юзера с id $user_id";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
		// dd($request->all());

        $validated = $request->validate([
            'name' => ['required', 'string', 'min:1', 'max:50'],
        ]);

        User::query()->create([
            'name' =>  $validated['name'],
        ]);

        alert(__('Пользователь создан!'), 'success');
        return redirect()->route('users');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $user_id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $user_id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user_id)
    {
        //
    }
}
