<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $education = Education::query()->orderBy('id', 'ASC')->get();
        $cities = DB::table('users as u')->select(
            'u.id',
            'u.name',
            DB::raw("GROUP_CONCAT(c.city) as cities")
        )
        ->leftjoin('cities as c', 'c.user_id', '=', 'u.id')

        ->groupBy('u.id')
        ->orderBy('u.id', 'ASC')
        ->get();

        return $cities;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user_id)
    {
        $cities = DB::table('users as u')->select(
            'u.id',
            'u.name',
            DB::raw("GROUP_CONCAT(c.city) as cities"),
        )
        ->leftjoin('cities as c', 'u.id', '=','c.user_id')
        ->where('u.id', '=', $user_id)
        ->groupBy('u.id')
        ->first();

        return $cities;
    }
}
