@extends("layouts.dashboard.master")
@section('title','UniMetrics | Reportes gráficas')
@section('content')
<livewire:courses-reports.charts-reports-component :athlete="'Marino'" chart-id="reportes-conteo" key="reportes-conteo"/>

@endsection

