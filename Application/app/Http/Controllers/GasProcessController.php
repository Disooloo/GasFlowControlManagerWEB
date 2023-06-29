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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
        $monitoring = new GasCompressors();
        $monitoring->name = $request->input('name');
        $monitoring->manufacturer = $request->input('manufacturer');
        $monitoring->max_pressure = $request->input('max_pressure');
        $monitoring->max_flow_rate = $request->input('max_flow_rate');
        $monitoring->current_flow_rate = 0;
        $monitoring->current_pressure = 0;

        $efficiency = ($monitoring->current_flow_rate / $monitoring->max_flow_rate) * ($monitoring->current_pressure / $monitoring->max_pressure) * 100;
        $monitoring->efficiency = $efficiency;

        $monitoring->save();

        $statesLogs = new StatesLogs();
        $statesLogs->gas_compressor_id = $monitoring->id;
        $statesLogs->state_name = $monitoring->name;
        $statesLogs->current_power = $monitoring->current_flow_rate;
        $statesLogs->current_pressure = $monitoring->current_pressure;
        $statesLogs->Based = "Добавлен";

        $statesLogs->save();

        return redirect('/monitoring');
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
    public function update(Request $request, GasCompressors $monitoring)
    {
        $monitoring->name = $request->input('name');
        $monitoring->manufacturer = $request->input('manufacturer');
        $monitoring->max_pressure = $request->input('max_pressure');
        $monitoring->max_flow_rate = $request->input('max_flow_rate');
        $monitoring->power = $request->input('power');
        $monitoring->status = $request->input('status');
        $monitoring->connect = $request->input('connect');
        $monitoring->save();

        // Запись в StatusLog
        $statusLog = new StatesLogs();
        $statusLog->gas_compressor_id = $monitoring->id;
        $statusLog->state_name = $monitoring->name;
        $statusLog->current_power = $monitoring->current_flow_rate;
        $statusLog->current_pressure = $monitoring->current_pressure;
        $statusLog->Based = "Редактирование";
        $statusLog->save();

        return redirect('/monitoring');
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
