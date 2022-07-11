<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class UsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Usuarios Registrados.')
            ->setSubtitle('Registros del año 2021 - 2022')
            ->addData('2021', [6, 9, 3, 4, 10, 8])
            ->addData('2022', [7, 3, 8, 2, 6, 4])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
