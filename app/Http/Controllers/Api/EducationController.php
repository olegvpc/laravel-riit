<?php

namespace App\Http\Controllers\Api;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $education = Education::query()->orderBy('id', 'ASC')->get();
        $education = DB::table('users as u')->select(
            'u.id',
            'u.name',
            'e.education',
        )
        ->leftjoin('education as e', 'e.user_id', '=', 'u.id')

        ->groupBy('u.id', 'e.education')
        ->orderBy('u.id', 'ASC')
        ->get();

        return $education;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user_id)
    {
        $education = DB::table('users as u')->select(
            'u.id',
            'u.name',
            'e.education',
        )
        ->leftjoin('education as e', 'e.user_id', '=', 'u.id')
        ->where('u.id', '=', $user_id)
        ->first();

        return $education;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $user_id)
    {
        // $request = {"education": "Музыкальное"}
        $education = $request->input('education');

        $education_new = Education::query()
        ->where('user_id', '=', $user_id)
        ->first();

        $education_new->education = $education;
        $education_new->save();
        return $education_new;
    }

}
