<?php

namespace App\Http\Livewire\CoursesReports;

use Livewire\Component;

class ChartsReportsComponent extends Component
{
    public $chartId;
    public $athlete;
    public $years;
    public $distances;
    public $total;

    public function render()
    {
        $this->total = "1200";
        return view('livewire.courses-reports.charts-reports-component');
    }
}
