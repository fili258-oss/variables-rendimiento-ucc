@extends("layouts.app")
@section('title','UniMetrics | Importar informes generales')
@section("content")
<form action="" method="post">
    <div class="row">
        <div class="col-md-6 col-lg-2 col-xl-3 order-0 mb-4">
          <label class="form-label" for="basic-icon-default-fullname">Período Academico</label>        
          <select id="defaultSelect" class="form-select">
              <option>Seleccione período</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
          </select>
        </div>
        <div class="col-md-6 col-lg-2 col-xl-4 order-0 mb-4">
            <label class="form-label" for="basic-icon-default-fullname">Archivo informe general de cursos CSV</label>                    
            <input class="form-control" type="file" id="formFile" accept="text/csv"/>
        </div>     
        <div class="col-md-6 col-lg-4 col-xl-2 order-1 mt-4">        
            <button class="btn btn-primary " type="button"><i class='bx bx-check-circle'></i> Importar</button>    
        </div>        
    </div>
</form>
<div class="row">
    <!-- Order Statistics -->
    <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4 mt-4">
        <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr class="text-nowrap">
                  <th>#</th>
                  <th>Ciclo</th>
                  <th>Programa académico</th>
                  <th>ID curso</th>
                  <th>Nombre curso</th>
                  <th>Nivel curso</th>
                  <th>Matriculados</th>
                  <th>Cancelaciones</th>
                  <th>Aprobados</th>
                  <th>No aprobados</th>
                  <th>Repitentes</th>
                  <th>ID Profesor</th>
                  <th>Profesor</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Table cell</td>
                  <td>Table cell</td>
                  <td>Table cell</td>
                  <td>Table cell</td>
                  <td>Table cell</td>
                  <td>Table cell</td>
                  <td>Table cell</td>
                  <td>Table cell</td>
                  <td>Table cell</td>
                  <td>Table cell</td>
                  <td>Table cell</td>
                  <td>Table cell</td>
                </tr>
              </tbody>
            </table>
          </div>
    </div>
    <!--/ Order Statistics -->
</div>
@endsection
