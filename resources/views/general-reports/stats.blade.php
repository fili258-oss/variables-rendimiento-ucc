@extends("layouts.dashboard.master")
@section('title','UniMetrics | Reportes gráficas')
@section('content')
<form action="{{ route('generateCharts') }}" method="POST">
  @csrf
    <div class="row">        
        <div class="col-md-6 col-lg-2 col-xl-2 order-0 mb-4">
            <label class="form-label" for="basic-icon-default-fullname">Período Academico</label>  
              
            <select id="period" class="form-select form-select-sm" name="period">
              @if($periods)
                @foreach ($periods as $period)
                  <option value="{{ $period->academicPeriodId }}">{{ $period->academicPeriodId }}</option>
                @endforeach  
              @else
                <option value=""></option>
              @endif                            
            </select>
        </div>
        <div class="col-md-6 col-lg-2 col-xl-2 order-1 mb-4">
            <label class="form-label" for="basic-icon-default-fullname">Programa Facultad</label>                        
            <select id="faculty" class="form-select form-select-sm" name="faculty">
              @if($facultys)
                @foreach ($facultys as $faculty)
                <option value="{{ $faculty->orgAcademic }}">{{ $faculty->orgAcademic }}</option>
                @endforeach   
              @else
                <option value=""></option>
              @endif                              
            </select>                                                        
        </div>
        <div class="col-md-6 col-lg-2 col-xl-4 order-2 mb-4">
            <label class="form-label" for="basic-icon-default-fullname">Curso</label>
            <select id="course" class="form-select form-select-sm" name="course">
              @if($courses)
                @foreach ($courses as $course)
                  <option value="{{ $course->nameCourse }}">{{ $course->nameCourse }}</option>
                @endforeach   
              @else
                <option value=""></option>
              @endif              
            </select>            
        </div>
        <div class="col-md-6 col-lg-2 col-xl-2 order-3 mb-4">
            <label class="form-label" for="basic-icon-default-fullname">Nivel Academico</label>            
                <select id="level" class="form-select form-select-sm" name="level">
                @if($levelsCourses)
                  @foreach ($levelsCourses as $level)
                    <option value="{{ $level->levelCourse }}">{{ $level->levelCourse }}</option>
                  @endforeach   
                @else
                  <option value=""></option>
                @endif                                                        
                </select>            
        </div>
        <div class="col-md-6 col-lg-4 col-xl-2 order-4 mt-4">            
            <input type="submit" class="btn btn-success btn-sm" value="Consultar">
            <button class="btn btn-danger btn-sm" type="button"><i class="bx bx-trash"></i></button>            
        </div>                        
    </div>
</form>
<div class="row">

    <!-- Expense Overview -->
    <div class="col-md-12 col-lg-12 col-xl-12 order-1 mb-4">
        <div class="card h-100">
            
            <div class="card-body px-0">
                <div class="tab-content p-0">
                    <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                        <div class="d-flex p-4 pt-3">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ asset("template/assets/img/icons/unicons/wallet.png") }}" alt="User" />
                            </div>
                            <div>
                                <small class="text-muted d-block">Total Balance</small>
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0 me-1">$459.10</h6>
                                    <small class="text-success fw-semibold">
                                        <i class="bx bx-chevron-up"></i>
                                        42.9%
                                    </small>
                                </div>
                            </div>
                        </div>
                        
                        <div id="chart" class="p-4"></div>
                        <div class="d-flex justify-content-center pt-4 gap-2">
                            <div class="flex-shrink-0">
                                
                            </div>
                            <div>
                                <p class="mb-n1 mt-1">Reporte This Week</p>
                                <small class="text-muted">$39 less than last week</small>
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
    var options = {
          series: [{
          data: [400, 430, 448, 470]
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

