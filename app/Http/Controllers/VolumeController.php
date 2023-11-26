<?php

namespace App\Http\Controllers;

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
        $day = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $index = ['1', '2', '3', '4', '5'];
        return view('volume.index', compact('day', 'index'));
    }

    public function show()
    {
        $user_id = Auth::id();
        $volume = DB::table('volumes')->where('user_id', $user_id)->get();
        // $volume = DB::table('volumes')->get();
        //Mengambil biodata user yang sedang login
        $user = Auth::user();
        //Jika biodata user belum ada, maka buat biodata baru
        if (!$user->volume) {
            $user->volume()->create();
        }
        return view('volume.show', compact('user', 'volume'));
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
        ]);

        $volume = Volume::create([
            'volume' => $validated['volume'],
            'user_id' => $validated['user_id'],
            'published_at' => $request->has('is_published') ? Carbon::now() : null,
        ]);

        return redirect()->route('volume.show')->with('success', 'Waste added successfully.');
    }

    public function update(Request $request)
    {

    }
}
