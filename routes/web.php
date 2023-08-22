<?php

use App\Http\Controllers\CoursesReports\GeneralReportsController;
use App\Http\Controllers\CoursesReports\ImportExportReportGeneralController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndividualCoursesReports\ImportExportIndividualReportsController;
use App\Http\Controllers\IndividualCoursesReports\IndividualReportsController;
use App\Http\Livewire\CoursesReports\ChartsReportsComponent;
use App\Http\Livewire\CoursesReports\GeneralReportsComponent;
use App\Http\Livewire\IndividualCoursesReports\IndividualCoursesComponent;
use App\Http\Livewire\IndividualCoursesReports\IndividualStudentsComponent;
use App\Http\Livewire\Users\UsersComponent;

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
Route::get('/importar-informes-generales', GeneralReportsComponent::class)->name('importReportsGeneral')->middleware('auth');
Route::get('/importar-informes-individuales', IndividualCoursesComponent::class)->name('importReportsIndividual')->middleware('auth');
Route::post('/import-report-general', [ImportExportReportGeneralController::class, 'import'])->name('importReports')->middleware('auth');
Route::post('/import-report-individual', [ImportExportIndividualReportsController::class, 'import'])->name('importReportsIndividuals')->middleware('auth');

Route::get('/informes-cursos-generales', [GeneralReportsController::class, 'reports'])->name('reportsGeneral')->middleware('auth');
Route::post('/graficar-reportes', [GeneralReportsController::class, 'drawingChart'])->name('generateCharts')->middleware('auth');

Route::get('/informes-cursos-individuales', IndividualStudentsComponent::class)->name('reportsIndividual')->middleware('auth');

/* Gestion de usuarios */
Route::get('lista-usuarios', UsersComponent::class)->name('usersList')->middleware('auth');