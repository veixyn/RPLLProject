<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Volume;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VolumeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $groupByRW = DB::select("SELECT users.rw, users.rt, volumes.type, SUM(volumes.volume) AS total
        //                         FROM users
        //                         INNER JOIN volumes ON users.id = volumes.user_id
        //                         GROUP BY users.rw, users.rt, volumes.type
        //                         ORDER BY users.rw, users.rt, volumes.type;");

        $data = DB::select("SELECT users.rw, users.rt, SUM(volumes.volume) AS total, type
                                    FROM users
                                    INNER JOIN volumes ON users.id = volumes.user_id
                                    GROUP BY users.rw, users.rt, type
                                    ORDER BY users.rw, users.rt, SUM(volumes.volume) DESC;");

        // $data1 = $data;

        $curDate = date('Y-m-d H:i:s');
        $day = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $index = ['1', '2', '3', '4', '5'];
        // return dd($data);
        return view('volume.index', compact('day', 'index', 'data', 'curDate'));
    }

    public function show()
    {
        $day = date('d');
        $days = date('l');
        $perDay = DB::select("SELECT *
                            FROM volumes
                            WHERE DAY(created_at) = $day ");

        $month = date('m');
        $month2 = date('F');
        $perMonth = DB::select("SELECT *
                                FROM volumes
                                WHERE MONTH(created_at) = $month ");

        $user_id = Auth::id();
        $volume = Volume::latest()->where('user_id', $user_id)->get();
        //Mengambil user yang sedang login
        $user = Auth::user();

        $totalInput = Volume::where('user_id', $user_id)->latest()->count();
        $totalKering = Volume::where('type', 'Kering')->where('user_id', $user_id)->sum('volume');
        $totalBasah = Volume::where('type', 'Basah')->where('user_id', $user_id)->sum('volume');
        $totalSampah = Volume::where('user_id', $user_id)->sum('volume');

        // return dd($perMonth);
        return view('volume.show', compact('user', 'volume', 'totalInput',
                    'totalKering', 'totalBasah', 'totalSampah', 'perMonth', 'month2',
                    'days', 'perDay'));
    }

    public function edit()
    {

    }

    public function create()
    {
        $user_id = Auth::id();
        return view('volume.create', compact('user_id'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'volume' => 'required|numeric|min:1|max:100',
            'user_id' => 'required',
            'type' => 'required',
            'type_description' => 'nullable'
        ]);

        $volume = Volume::create([
            'volume' => $validated['volume'],
            'user_id' => $validated['user_id'],
            'type' => $validated['type'],
            'type_description' => $validated['type_description'],
            'published_at' => $request->has('is_published') ? Carbon::now() : null,
        ]);

        return redirect()->route('volume.show')->with('success', 'Waste added successfully.');
    }

    public function update(Request $request)
    {

    }
}
