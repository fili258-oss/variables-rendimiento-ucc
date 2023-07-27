<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ApexCharts extends Component
{
    public $chartId;
    public $seriesData;
    public $categories;

    public function __construct($chartId, $seriesData, $categories) {
        $this->chartId = $chartId;
        $this->seriesData = $seriesData;
        $this->categories = $categories;
    }

    public function render() {
        return view('components.apex-charts');
    }
}