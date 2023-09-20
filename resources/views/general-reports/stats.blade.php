@extends("layouts.dashboard.master",['active' => 'menu activo'])
@section('title','UniMetrics | Reportes gráficas')
@section('content')

@livewire('courses-reports.filter-chart-reports-component')
<div class="row">
  <!-- Expense Overview -->
  <div class="col-md-12 col-lg-12 col-xl-12 order-1 mb-4">
    <div class="card h-100">

      <div class="card-body px-0">
        <div class="tab-content p-0">
          <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">            
              @if ($queryConsulted)
              <div class="d-flex justify-content-center pt-4 gap-2">
                <p class="mb-n1 mt-1">Periodo acádemico: {{ $periodConsulted }}</p>
                <p class="mb-n1 mt-1">Facultad: {{ $facultyConsulted }}</p>
                <p class="mb-n1 mt-1">Curso: {{ $courseConsulted }}</p>
                <p class="mb-n1 mt-1">Nivel curso: {{ $levelConsulted }}</p>
              </div>
              @endif            
            <div id="chart" class="p-4"></div>
            <div class="d-flex justify-content-center pt-4 gap-2">
              <div class="flex-shrink-0">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Expense Overview -->
</div>
@endsection

@section('scripts')
<script>
  let approveds = {{ $totales !=null ? $totales->approveds: 0 }} 
  let notApproveds = {{ $totales !=null ? $totales->notApproveds: 0 }}
  let cancellations= {{ $totales !=null ? $totales->cancellations: 0 }}
  let repeaters= {{ $totales !=null ? $totales->repeaters: 0 }}

    var options = {
          series: [{
          data: [approveds, notApproveds, cancellations, repeaters]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: false,
          }
        },
        dataLabels: {
          enabled: true
        },
        xaxis: {
          categories: ['Aprobados', 'No aprobados', 'Cancelaciones', 'Repitentes'
          ],
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
        
</script>
@endsection