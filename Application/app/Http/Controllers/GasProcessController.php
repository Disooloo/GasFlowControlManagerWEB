<?php

namespace App\Http\Controllers;

use App\Models\GasCompressors;
use App\Models\StatesLogs;
use App\Models\User;
use Illuminate\Http\Request;

class GasProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $GasCompressors = GasCompressors::orderBy('id', 'desc')->paginate(15);
        $GasCompressors_count = GasCompressors::all()->count();

        //return view('GasProcess.GasProcessIndex', compact('GasCompressors', 'GasCompressors_count'));
        return view('admin.GasProcess.index', compact('GasCompressors', 'GasCompressors_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GasCompressors $monitoring)
    {
        $GasCompressors = GasCompressors::orderBy('id', 'desc')->paginate(15);

        $states_logs = StatesLogs::where('gas_compressor_id', $monitoring->id)->latest()->take(5)->get();

        return view("admin.GasProcess.show", compact("GasCompressors", "monitoring", "states_logs"));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
