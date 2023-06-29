<?php

namespace App\Http\Controllers;

use App\Models\GasCompressors;
use App\Models\ParametersLogs;
use App\Models\StatesLogs;
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

        $GasCompressors = GasCompressors::orderBy('id', 'desc');
        $GasCompressors_count = GasCompressors::all()->count();
        $GasCompressors_count_errors = GasCompressors::where('warning', 1)->count();
        $GasCompressors_count_go = GasCompressors::where('warning', 0)->count();

        $teams = User::orderBy('id', 'desc')->paginate(8);
        $team_count =  User::all()->count();
        $team_count_Moder =  User::where('Moderation', 1)->count();

        $states_logs = StatesLogs::orderBy('id', 'desc')->paginate(15);;


        return view('welcome', compact('GasCompressors', 'GasCompressors_count', 'team_count', 'teams',
            'GasCompressors_count_errors', 'GasCompressors_count_go', 'team_count_Moder', 'states_logs'));


    }
}
