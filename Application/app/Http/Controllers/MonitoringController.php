<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MonitoringController extends Controller
{
    public function updateMonitoringValues(Request $request)
    {
        Artisan::call('monitoring:update-values');

        return redirect()->back()->with('success', 'Успешно...');
    }
}
