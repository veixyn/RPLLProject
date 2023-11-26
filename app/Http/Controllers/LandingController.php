<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Handle the incoming request.
     */

     public function __construct(){
        $this->middleware('auth');
     }
    public function __invoke(Request $request)
    {
        return view('landing');
    }
}
