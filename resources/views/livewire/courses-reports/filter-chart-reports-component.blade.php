<div>
    <form action="{{ route('generateCharts') }}" method="POST">
        @csrf
          <div class="row py-2">               
            <div class="col-md-6 col-lg-2 col-xl-2 order-0 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Período Academico</label>  
                
                <select id="period" class="form-select form-select-sm" wire:model="selectedPeriod" name="period">
                <option value="">Seleccione una opción</option>
                @if($periods)
                    @foreach ($periods as $period)                  
                    <option value="{{ $period}}" >{{ $period }}</option>                                 
                    @endforeach  
                @else
                    <option value=""></option>
                @endif                                          
                </select>
            </div>              
            @if(!is_null($facultys))
            <div class="col-md-6 col-lg-2 col-xl-2 order-1 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Programa Facultad</label>                        
                <select id="faculty" class="form-select form-select-sm" wire:model="selectedFaculty" name="faculty">
                  <option value="">Seleccione una opción</option>
                  @if($facultys)
                    @foreach ($facultys as $faculty)
                    <option value="{{ $faculty }}">{{ $faculty }}</option>
                    @endforeach   
                  @else
                    <option value=""></option>
                  @endif                              
                </select>                                                        
            </div>
            @endif
            @if(!is_null($levelsCourses))
            <div class="col-md-6 col-lg-2 col-xl-2 order-2 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Nivel Academico</label>            
                    <select id="level" class="form-select form-select-sm" wire:model="selectedLevelCourse" name="level">
                    <option value="">Seleccione una opción</option>
                      @if($levelsCourses)
                        @foreach ($levelsCourses as $level)
                          <option value="{{ $level }}">{{ $level }}</option>
                        @endforeach   
                      @else
                        <option value=""></option>
                      @endif                                                        
                    </select>            
            </div> 
            @endif
            @if(!is_null($courses))
            <div class="col-md-6 col-lg-2 col-xl-4 order-3 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Curso</label>
                <select id="course" class="form-select form-select-sm" wire:model="selectedCourse" name="course">
                  <option value="">Seleccione una opción</option>
                  @if($courses)
                    @foreach ($courses as $course)
                      <option value="{{ $course }}">{{ $course }}</option>
                    @endforeach   
                  @else
                    <option value=""></option>
                  @endif              
                </select>            
            </div>
            @endif
                        
            <div class="col-md-6 col-lg-4 col-xl-2 order-4 mt-4">            
                <input type="submit" class="btn btn-success btn-sm" value="Consultar">
                <button class="btn btn-danger btn-sm" type="button"><i class="bx bx-trash"></i></button>            
            </div>                        
          </div>
      </form>    
</div>
