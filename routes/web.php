<?php

use App\Http\Controllers\CoursesReports\GeneralReportsController;
use App\Http\Controllers\CoursesReports\ImportExportReportGeneralController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\CoursesReports\ChartsReportsComponent;
use App\Http\Livewire\CoursesReports\GeneralReportsComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/escritorio', [HomeController::class, 'index'])->name('escritorio');
Route::get('/importar-informes', GeneralReportsComponent::class)->name('importReportsGeneral')->middleware('auth');
Route::post('/import', [ImportExportReportGeneralController::class, 'import'])->name('importReports')->middleware('auth');

Route::get('/informes-cursos', [GeneralReportsController::class, 'reports'])->name('reportsGeneral')->middleware('auth');
Route::post('/graficar-reportes', [GeneralReportsController::class, 'drawingChart'])->name('generateCharts')->middleware('auth');