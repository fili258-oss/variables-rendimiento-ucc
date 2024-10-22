<?php

namespace App\Http\Livewire\AppoinmetModule\Components;

use Livewire\Component;
use Illuminate\Support\Carbon;

class CalendarComponent extends Component
{
    protected $currentDateTime;
    
    public $inicioCalendario;
    public $finCalendario;
    public $fecha;
    public $anio;
    public $countMes = 1;
    public $etiquetaDias = ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'];
    public $meses = [ 1 => 'Enero',
                      2 => 'Febrero',
                      3 => 'Marzo',
                      4 => 'Abril',
                      5 => 'Mayo',
                      6 => 'Junio',
                      7 => 'Julio',
                      8 => 'Agosto',
                      9 => 'Septiembre',
                      10 => 'Octubre',
                      11 => 'Noviembre',
                      12 => 'Diciembre', ];

    // inicializamos calendario
    public function mount()
    {
        $this->currentDateTime = now();
        
        $this->countMes = $this->currentDateTime->format('n');
        $this->inicioCalendario = $this->currentDateTime->copy()->firstOfMonth()->startOfWeek(Carbon::SUNDAY);
        $this->finCalendario = $this->currentDateTime->copy()->lastOfMonth()->endOfWeek(Carbon::SATURDAY);
        $this->fecha = $this->currentDateTime->copy();
        $this->anio = $this->currentDateTime->copy()->format('Y');
    }

    /**
     * Metodo para incrementar, tanto por mes, como por año
     */
    public function incrementar($objeto)
    {
        // Creamos una instacia de la fecha con el mes, y año que está en la vista
        $this->currentDateTime = Carbon::createFromFormat('n/Y', $this->countMes.'/'.$this->anio);

        // Si el parametro es M es porque se incrementa un mes,
        // por lo que nos valemos del metodo addMonth de Carbon
        if ($objeto == "m") {
            $this->inicioCalendario = $this->currentDateTime->copy()
                                            ->addMonth()
                                            ->firstOfMonth()
                                            ->startOfWeek(Carbon::SUNDAY);
            $this->finCalendario = $this->currentDateTime->copy()
                                        ->addMonth()
                                        ->lastOfMonth()
                                        ->endOfWeek(Carbon::SATURDAY);
            
            // establecemos los valores para mes y año que figuran en la vista
            $this->countMes = (int) $this->currentDateTime->copy()->addMonth()->format('n');
            $this->anio = (int) $this->currentDateTime->copy()->addMonth()->format('Y');
        } else {
            // Si el parametro es A es porque se incrementa un año,
            // por lo que nos valemos del metodo addYear de Carbon
            $this->inicioCalendario = $this->currentDateTime->copy()
                                            ->addYear()
                                            ->firstOfMonth()
                                            ->startOfWeek(Carbon::SUNDAY);
            $this->finCalendario = $this->currentDateTime->copy()
                                        ->addYear()
                                        ->lastOfMonth()
                                        ->endOfWeek(Carbon::SATURDAY);
            // establecemos los valores para mes y año que figuran en la vista
            $this->countMes = (int) $this->currentDateTime->copy()->addYear()->format('n');
            $this->anio = (int) $this->currentDateTime->copy()->addYear()->format('Y');
        }
    }

    /**
     * Metodo para decrementar, tanto por mes, como por año
     * La lógica es la misma que para el incremento,
     * pero utilizando los metodos subMonth y subYear de Carbon
     */
    public function decrementar($objeto)
    {
        $this->currentDateTime = Carbon::createFromFormat('n/Y', $this->countMes.'/'.$this->anio);

        if ($objeto == "m") {
            $this->inicioCalendario = $this->currentDateTime->copy()
                                            ->subMonth()
                                            ->firstOfMonth()
                                            ->startOfWeek(Carbon::SUNDAY);
            $this->finCalendario = $this->currentDateTime->copy()
                                        ->subMonth()
                                        ->lastOfMonth()
                                        ->endOfWeek(Carbon::SATURDAY);
            
            $this->countMes = (int) $this->currentDateTime->copy()->subMonth()->format('n');
            $this->anio = (int) $this->currentDateTime->copy()->subMonth()->format('Y');
        } else {
            $this->inicioCalendario = $this->currentDateTime->copy()
                                            ->subYear()
                                            ->firstOfMonth()
                                            ->startOfWeek(Carbon::SUNDAY);
            $this->finCalendario = $this->currentDateTime->copy()
                                        ->subYear()
                                        ->lastOfMonth()
                                    ->endOfWeek(Carbon::SATURDAY);
            
            $this->countMes = (int) $this->currentDateTime->copy()->subYear()->format('n');
            $this->anio = (int) $this->currentDateTime->copy()->subYear()->format('Y');
        }
    }

    public function render()
    {
        return view('livewire.components.calendar-component');
    }


}
