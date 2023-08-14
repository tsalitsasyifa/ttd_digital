<?php

namespace App\Charts;

use App\Models\Document;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DashboardChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $dashboardData = Document::get();
        $data = [
            $dashboardData->where('status', 1)->count(),
            $dashboardData->where('status', 2)->count(),
            $dashboardData->where('status', 3)->count(),
            $dashboardData->where('status', 4)->count(),
        ];
        $label = [
            'Butuh Persetujuan',
            'Sudah Disetujui',
            'Revisi',
            'Tidak Disetujui',
        ];

        return $this->chart->pieChart()
            ->setTitle('Data Status Dokumen')
            ->setSubtitle(date('Y'))
            ->addData($data)
            ->setLabels($label);
    }
}
