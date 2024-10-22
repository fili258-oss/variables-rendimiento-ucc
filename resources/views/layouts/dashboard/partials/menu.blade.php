<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
        <img src="{{ asset('template/assets/img/logos/logotipo-ucc.svg') }}" alt="">
        
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

<div class="menu-inner-shadow"></div>

<ul class="menu-inner py-1">
    <!-- Components -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Gestión Iformes </span></li>
    <li class="menu-item">
        <a href="{{ route('globalReports') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-world"></i>
            <div data-i18n="Basic">Informe Global</div>
        </a>
    </li>
        
    @can('importReportsGeneral.index')
    <li class="menu-item ">
        <a href="{{ route('importReportsGeneral') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-import"></i>
            <div data-i18n="Basic">Import ReportGeneral</div>
        </a>
    </li>        
    @endcan    
    <li class="menu-item ">
        <a href="{{ route('reportsGeneral') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-chart"></i>
            <div data-i18n="Basic">Informe General</div>
        </a>
    </li>
    @can('importReportsIndividual.index')
    <li class="menu-item ">
        <a href="{{ route('importReportsIndividual') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-import"></i>
            <div data-i18n="Basic">Import Notas</div>
        </a>
    </li>        
    @endcan
    <li class="menu-item ">
        <a href="{{ route('reportsIndividual') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-chart"></i>
            <div data-i18n="Basic">Informe Individual</div>
        </a>
    </li>
    @can('importReportsSitAcademicStudents.index')
    <li class="menu-item ">
        <a href="{{ route('importReportsSitAcademicStudents') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-import"></i>
            <div data-i18n="Basic">Import SitAcadémica</div>
        </a>
    </li>     
    @endcan       
    <li class="menu-item ">
        <a href="{{ route('reportsSitAcademicStudents') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-chart"></i>
            <div data-i18n="Basic">Informe SitAcadémica</div>
        </a>
    </li>
    @can('usersList.index')
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Gestión Usuarios</span></li> 
    <!-- User interface -->
    <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-box"></i>
            <div data-i18n="User interface">Admin Usuarios</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
            <a href="{{ route('usersList') }}" class="menu-link">
                <div data-i18n="Accordion">Usuarios</div>
            </a>
            </li>                        
        </ul>        
    </li>        
    @endcan           
    
    <li class="menu-item">
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form-menu').submit();" class="menu-link">
            <i class="menu-icon tf-icons bx bx-power-off me-2"></i>
            <div data-i18n="Boxicons">Cerrar sesión</div>
        </a>
        <form action="{{ route('logout') }}" method="POST" class="d-none" id="logout-form-menu">
            @csrf
        </form>
    </li>
        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Gestión Citas </span></li>
        <li class="menu-item">
            <a href="{{ route('studentsEnlace') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Basic">Estudiantes Enlace</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('appoinmentsEnlace') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div data-i18n="Basic">Citas Enlace</div>
            </a>
        </li>
</ul>
</aside>