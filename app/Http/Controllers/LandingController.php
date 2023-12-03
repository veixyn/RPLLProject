<?php

namespace App\Http\Controllers;

use App\Models\Educational;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Handle the incoming request.
     */

     public function __construct(){
        // $this->middleware('auth');
        // $this->middleware('admin');
     }
    public function __invoke(Request $request)
    {
        //Ambil data artikel diurutkan berdasarkan tanggal terbaru. lalu tampilkan 7 artikel per halaman
        $educationals = Educational::query()->orderBy('educational_category_id');

        if ($request->query('educationalCategory')) {
            //Filter artikel berdasarkan category
            $educationals->whereHas('educationalCategory', function ($query) use ($request) {
                $query->where('slug', $request->query('educationalCategory'));
            });
        }

        $educationals = $educationals?->latest()->paginate(7);
        return view('landing', compact('educationals'));
    }
}
