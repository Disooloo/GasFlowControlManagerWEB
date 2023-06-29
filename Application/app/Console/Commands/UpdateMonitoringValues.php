<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\GasCompressors;
use App\Models\StatesLogs;
use Carbon\Carbon;

class UpdateMonitoringValues extends Command
{
    protected $signature = 'monitoring:update-values';
    protected $description = 'Update current values for gas compressors monitoring';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Получение всех газовых компрессоров
        $compressors = GasCompressors::all();

        foreach ($compressors as $compressor) {
            $maxFlowRate = $compressor->max_flow_rate;
            $maxPressure = $compressor->max_pressure;

            // Вычисление изменения в пределах 30% от максимальных значений
            $flowRateChange = $maxFlowRate * 0.3;
            $pressureChange = $maxPressure * 0.3;

            // Генерация случайного значения для текущей мощности (в пределах изменения 30%)
            $randomFlowRate = rand($maxFlowRate - $flowRateChange, $maxFlowRate + $flowRateChange);
            $randomPressure = rand($maxPressure - $pressureChange, $maxPressure + $pressureChange);

            // Вероятность пересечения максимального значения - 1 из 10 случаев (10%)
            $shouldCrossMax = rand(1, 10) === 1;

            if ($shouldCrossMax) {
                // Пересечение максимального значения
                $randomFlowRate = $maxFlowRate + rand(1, 10);
                $randomPressure = $maxPressure + rand(1, 10);
            }

            // Рассчет эффективности компрессора
            $efficiency = ($compressor->current_flow_rate / $compressor->max_flow_rate) * ($compressor->current_pressure / $compressor->max_pressure) * 100;

            // Обновление текущей мощности и давления
            $compressor->current_flow_rate = min($randomFlowRate, $maxFlowRate);
            $compressor->current_pressure = min($randomPressure, $maxPressure);
            $compressor->efficiency = $efficiency;

            $compressor->save();

            // Создание новой записи в StatusLog
            $statusLog = new StatesLogs();
            $statusLog->gas_compressor_id = $compressor->id;
            $statusLog->state_name = $compressor->name;
            $statusLog->current_power = $compressor->current_flow_rate;
            $statusLog->current_pressure = $compressor->current_pressure;
            $statusLog->Based = "Изменения";
            $statusLog->updated_at = Carbon::now();
            $statusLog->save();
        }

        $this->info('Current values for gas compressors monitoring updated successfully.');
    }
}
