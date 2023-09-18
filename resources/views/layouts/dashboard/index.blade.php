@extends("layouts.dashboard.master")
@section('title','UniMetrics | Reportes generales')
@section('content')
<div class="row">
    <!-- Order Statistics -->
    <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between pb-0">
                <div class="card-title mb-0">
                    <h3 class="m-0 me-2">¡Hola {{ Auth::user()->name }} Bienvenido a Unimetrics UCC!</h3>                    
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-column align-items-center gap-1">
                        <span>Software para realizar seguimiento academico de estudiantes</span>
                    </div>
                  
                </div>
                <div>
                    <img src="{{ asset('template/assets/img/illustrations/Data-amico.svg') }}" height="550" alt="">                    
                </div>
            </div>
        </div>
    </div>
    <!--/ Order Statistics -->
</div>
@endsection
