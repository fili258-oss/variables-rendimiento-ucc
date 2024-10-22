<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="calendar">
        <div></div>
      <div class="cabecera">
        <i class="fas fa-angle-left nav" wire:click="decrementar('m')"></i>
        <div>{{ $meses[$countMes] }}</div>
        <i class="fas fa-angle-right nav" wire:click="incrementar('m')"></i>
        
        <i class="fas fa-angle-left nav" wire:click="decrementar('a')"></i>
        <div><span class="year">{{ $anio }}</span></div>
        <i class="fas fa-angle-right nav " wire:click="incrementar('a')"></i>
      </div>
      
      <div class="days">
        @foreach ($etiquetaDias as $dia)
        <span>{{ $dia }}</span>
        @endforeach
      </div>
        
      <div class="dates">
        @php
          $extraClass = "";
        @endphp
        
        @while ($inicioCalendario <= $finCalendario)
  
          @php
            $extraClass = $inicioCalendario->format('m') != $fecha->format('m') ? 'deshabilitado' : '';
            $extraClass .= $inicioCalendario->isToday() ? ' today ' : '';
          @endphp
  
          <button  class="{{ $extraClass }}" >
            <time>{{ $inicioCalendario->format('j') }}</time>
          </button>
          
          @php
            $inicioCalendario->addDay();
          @endphp 
        @endwhile
      </div>
    </div>
  </div>
  