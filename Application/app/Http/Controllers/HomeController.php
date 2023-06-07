<?php

namespace App\Http\Controllers;

use App\Models\GasCompressors;
use App\Models\User;
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

        $GasCompressors= GasCompressors::orderBy('id', 'desc');
        $GasCompressors_count = GasCompressors::all()->count();

        $teams = User::orderBy('id', 'desc')->paginate(15);
        $team_count =  User::all()->count();


        return view('welcome', compact('GasCompressors', 'GasCompressors_count',
            'team_count', 'teams'));

    }
}
