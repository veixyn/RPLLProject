<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Volume;
use DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $months = DB::table('volumes')
                        ->select(DB::raw("MONTHNAME(created_at) as month"))
                        ->orderByDesc('month')
                        ->distinct()
                        ->get();

        // return dd($months);
        return view('report.index', compact('months'));
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
    public function show()
    {
        // Get the selected month from the request
        $selectedMonth = request('month');

        $months = DB::table('volumes')->select(DB::raw("MONTHNAME(created_at) as month"))->distinct()->get();

        // Fetch data from the database based on the selected month
        // $data = DB::table('volumes')
        //             ->join('users', 'volumes.user_id', '=', 'users.id')
        //             ->selectRaw("users.*, volumes.*, SUM(volumes.volume) as total")
        //             ->whereRaw("MONTHNAME(volumes.created_at) = '$selectedMonth'")
        //             ->groupByRaw("volumes.id, users.rt, users.rw, user_id")
        //             ->get();
        $data = DB::select("SELECT
                                v.user_id,
                                u.rw,
                                u.rt,
                                u.name,
                                COALESCE(SUM(CASE WHEN v.type = 'Basah' THEN v.volume ELSE 0 END), 0) AS Basah,
                                COALESCE(SUM(CASE WHEN v.type = 'Kering' THEN v.volume ELSE 0 END), 0) AS Kering,
                                COALESCE(SUM(v.volume), 0) AS Total,
                                MAX(v.created_at) AS latest_created_at
                            FROM
                                users u
                            CROSS JOIN volumes v ON u.id = v.user_id AND MONTHNAME(v.created_at) = '$selectedMonth'
                            GROUP BY
                                v.user_id,
                                u.rw,
                                u.rt,
                                u.name
                            ORDER BY
                                u.rw,
                                u.rt,
                                v.user_id ASC
                                ;");

        return view('report.index', compact('data', 'selectedMonth', 'months'));
        // return dd($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
