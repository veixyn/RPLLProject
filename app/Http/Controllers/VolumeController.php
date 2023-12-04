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
                        LEFT JOIN volumes v ON u.id = v.user_id AND DATE(v.created_at) = '$curDate'

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
        return view('volume.index', compact('data', 'curDate', 'prevDate'));
    }

    public function show()
    {
        $day = date('d');
        $perDay = Volume::whereDay('created_at', $day)->paginate(10);
        // $perDay = DB::select("SELECT *
        //                     FROM volumes
        //                     WHERE DAY(created_at) = $day ");

        $days = date('l');
        switch ($days) {
            case 'Monday':
                $localizedDay = 'Senin';
                break;
            case 'Tuesday':
                $localizedDay = 'Selasa';
                break;
            case 'Wednesday':
                $localizedDay = 'Rabu';
                break;
            case 'Thursday':
                $localizedDay = 'Kamis';
                break;
            case 'Friday':
                $localizedDay = 'Jumat';
                break;
            case 'Saturday':
                $localizedDay = 'Sabtu';
                break;
            case 'Sunday':
                $localizedDay = 'Minggu';
                break;

            default:
                # code...
                break;
        }

        $month = date('m');
        $month2 = date('F');
        $perMonths = DB::select("SELECT rw, rt, name, volume, type, volumes.created_at
                                FROM volumes
                                INNER JOIN users ON volumes.user_id = users.id
                                WHERE MONTH(volumes.created_at) = '$month' ");

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
                    'totalKering', 'totalBasah', 'totalSampah', 'perMonths', 'month2',
                    'localizedDay', 'perDay'));
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
