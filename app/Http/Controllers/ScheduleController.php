<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use DB;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $groupByRW = DB::select("SELECT users.rw, users.rt, volumes.type, SUM(volumes.volume) AS total
        //                         FROM users
        //                         INNER JOIN volumes ON users.id = volumes.user_id
        //                         GROUP BY users.rw, users.rt, volumes.type
        //                         ORDER BY users.rw, users.rt, volumes.type;");

        $curDate = date('Y-m-d');
        $prevDate = date('Y-m-d', strtotime($curDate . ' -1 day'));
        // $curDate = "2023-10-27";
        $data = DB::select("SELECT
                            u.rw,
                            u.rt,
                            COALESCE(SUM(CASE WHEN v.type = 'Basah' THEN v.volume ELSE 0 END), 0) AS Basah,
                            COALESCE(SUM(CASE WHEN v.type = 'Kering' THEN v.volume ELSE 0 END), 0) AS Kering,
                            COALESCE(SUM(v.volume), 0) AS Total,
                            MAX(v.created_at) AS latest_created_at
                        FROM
                            users u
                        LEFT JOIN volumes v ON u.id = v.user_id AND DATE(v.created_at) = '$prevDate'

                        GROUP BY
                            u.rw,
                            u.rt
                        ORDER BY
                            Total DESC,
                            u.rw,
                            u.rt
                            ;");

// SELECT users.rw, users.rt, volumes.type,
// CASE WHEN volumes.type = 'Basah' THEN SUM(volumes.volume) ELSE 0 END AS Basah,
// CASE WHEN volumes.type = 'Kering' THEN SUM(volumes.volume) ELSE 0 END AS Kering, MAX(volumes.created_at)
//                             FROM users
//                             INNER JOIN volumes ON users.id = volumes.user_id
//                             WHERE DATE(volumes.created_at) = '2023-10-27'
//                             GROUP BY users.rw, users.rt, volumes.type
//                             ORDER BY users.rw, users.rt ASC

        // $data1 = $data;

        // $schedule = ['1', '2', '3', '4', '5', '6', '7', '8', '9'];
        // $index = ['1', '2', '3', '4', '5'];

        // return dd($prevDate);
        return view('schedule.index', compact('data', 'curDate', 'prevDate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
