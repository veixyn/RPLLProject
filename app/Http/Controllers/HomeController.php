<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data1 = DB::select("SELECT users.rw, users.rt, SUM(volumes.volume) AS total
                                FROM users
                                INNER JOIN volumes ON users.id = volumes.user_id
                                GROUP BY users.rw, users.rt
                                ORDER BY SUM(volumes.volume) DESC;");

        $curDate = date('Y-m-d H:i:s');
        $day = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $index = ['1', '2', '3', '4', '5'];
        // return dd(array_merge($day, $data1));
        return view('volume.index', compact('day', 'index', 'data1', 'curDate'));
    }
}
