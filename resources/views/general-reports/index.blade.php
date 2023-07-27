@extends("layouts.dashboard.master")
@section('title','UniMetrics | Reportes generales')
@section('content')
<form action="" method="post">
    <div class="row">
        {{-- {{ $menu ? 'active' : '' }} --}}
        <div class="col-md-6 col-lg-2 col-xl-3 order-0 mb-4">
            <label class="form-label" for="basic-icon-default-fullname">Período Academico</label>        
            <select id="smallSelect" class="form-select form-select-sm">
                <option>Small select</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-md-6 col-lg-2 col-xl-3 order-1 mb-4">
            <label class="form-label" for="basic-icon-default-fullname">Programa Facultad</label>            
            <select id="smallSelect" class="form-select form-select-sm">
                <option>Small select</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>            
        </div>
        <div class="col-md-6 col-lg-2 col-xl-2 order-2 mb-4">
            <label class="form-label" for="basic-icon-default-fullname">Curso</label>
            <select id="smallSelect" class="form-select form-select-sm">
                <option>Small select</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>            
        </div>
        <div class="col-md-6 col-lg-2 col-xl-2 order-3 mb-4">
            <label class="form-label" for="basic-icon-default-fullname">Nivel Academico</label>            
                <select id="smallSelect" class="form-select form-select-sm">
                    <option>Small select</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>            
        </div>
        <div class="col-md-6 col-lg-4 col-xl-2 order-4 mt-4">            
            <button class="btn btn-success btn-sm" type="button"><i class='bx bx-check-circle'></i></button>
            <button class="btn btn-danger btn-sm" type="button"><i class="bx bx-trash"></i></button>            
        </div>                        
    </div>
</form>
<div class="row">
    <!-- Order Statistics -->
    <div class="col-md-6 col-lg-6 col-xl-6 order-0 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between pb-0">
                <div class="card-title mb-0">
                    <h5 class="m-0 me-2">Estadisticas del curso</h5>
                    <small class="text-muted">42.82k Total Sales</small>
                </div>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                        <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                        <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-column align-items-center gap-1">
                        <h2 class="mb-2">8,258</h2>
                        <span>Total Orders</span>
                    </div>
                    <div id="orderStatisticsChart"></div>
                </div>
                <ul class="p-0 m-0">
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-mobile-alt"></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Estudiantes repitentes:</h6>
                                <small class="text-muted">Mobile, Earbuds, TV</small>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold">10%</small>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-success"><i class="bx bx-closet"></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Estudiantes reprobados:</h6>
                                <small class="text-muted">T-shirt, Jeans, Shoes</small>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold">20%</small>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Estudiantes que cancelaron:</h6>
                                <small class="text-muted">Fine Art, Dining</small>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold">35%</small>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-secondary"><i class="bx bx-football"></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Sports</h6>
                                <small class="text-muted">Football, Cricket Kit</small>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold">35%</small>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/ Order Statistics -->

    <!-- Expense Overview -->
    <div class="col-md-6 col-lg-6 col-xl-6 order-1 mb-4">
        <div class="card h-100">
            
            <div class="card-body px-0">
                <div class="tab-content p-0">
                    <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                        <div class="d-flex p-4 pt-3">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../assets/img/icons/unicons/wallet.png" alt="User" />
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
                        <div id="incomeChart"></div>
                        <div class="d-flex justify-content-center pt-4 gap-2">
                            <div class="flex-shrink-0">
                                <div id="expensesOfWeek"></div>
                            </div>
                            <div>
                                <p class="mb-n1 mt-1">Expenses This Week</p>
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
