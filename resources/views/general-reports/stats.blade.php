@extends("layouts.dashboard.master",['active' => 'menu activo'])
@section('title','UniMetrics | Reportes gráficas')
@section('content')
<form action="{{ route('generateCharts') }}" method="POST">
  @csrf
    <div class="row">        
        <div class="col-md-6 col-lg-2 col-xl-2 order-0 mb-4">
            <label class="form-label" for="basic-icon-default-fullname">Período Academico</label>  
              
            <select id="period" class="form-select form-select-sm" name="period">
              <option value="">Seleccione una opción</option>
              @if($periods)
                @foreach ($periods as $period)                  
                  <option value="{{ $period->academicPeriodId }}" >{{ $period->academicPeriodId }}</option>                                 
                @endforeach  
              @else
                <option value=""></option>
              @endif                                          
            </select>
        </div>
        <div class="col-md-6 col-lg-2 col-xl-2 order-1 mb-4">
            <label class="form-label" for="basic-icon-default-fullname">Programa Facultad</label>                        
            <select id="faculty" class="form-select form-select-sm" name="faculty">
              <option value="">Seleccione una opción</option>
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
              <option value="">Seleccione una opción</option>
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
                <option value="">Seleccione una opción</option>
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
                                <small class="text-muted d-block">Total variables</small>
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0 me-1">Aprobados: {{ $totales !=null ? $totales->approveds: '0' }}</h6>
                                    <h6 class="mb-0 me-1">No aprobados: {{ $totales !=null ? $totales->notApproveds: '0' }}</h6>
                                    <h6 class="mb-0 me-1">Cancelaciones: {{ $totales !=null ? $totales->cancellations: '0' }}</h6>
                                    <h6 class="mb-0 me-1">Repitentes: {{ $totales !=null ? $totales->repeaters: '0' }}</h6>
                                  
                                </div>
                            </div>
                        </div>
                        
                        <div id="chart" class="p-4"></div>
                        <div class="d-flex justify-content-center pt-4 gap-2">
                            <div class="flex-shrink-0">
                                
                            </div>
                            <div>
                                {{-- <p class="mb-n1 mt-1">Curso: </p> --}}
                                
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

