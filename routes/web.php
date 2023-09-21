<?php

use App\Http\Controllers\CoursesReports\GeneralReportsController;
use App\Http\Controllers\CoursesReports\ImportExportReportGeneralController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndividualCoursesReports\ImportExportIndividualReportsController;
use App\Http\Controllers\IndividualCoursesReports\IndividualReportsController;
use App\Http\Controllers\SitAcademicReports\ImportExportSitAcademicController;
use App\Http\Livewire\CoursesReports\ChartsReportsComponent;
use App\Http\Livewire\CoursesReports\GeneralReportsComponent;
use App\Http\Livewire\CoursesReports\GlobalReportsComponent;
use App\Http\Livewire\IndividualCoursesReports\IndividualCoursesComponent;
use App\Http\Livewire\IndividualCoursesReports\IndividualStudentsComponent;
use App\Http\Livewire\SitAcademicReports\SitAcademicStudentsComponent;
use App\Http\Livewire\Users\UsersComponent;
use App\Models\SitAcademicReportStudent;

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

Route::get('admin/escritorio', [HomeController::class, 'index'])->name('escritorio');
Route::get('admin/importar-informes-generales', GeneralReportsComponent::class)->name('importReportsGeneral')->middleware('auth','can:importReportsGeneral.index');
Route::get('admin/importar-informes-individuales', IndividualCoursesComponent::class)->name('importReportsIndividual')->middleware('auth','can:importReportsIndividual.index');
Route::post('admin/import-report-general', [ImportExportReportGeneralController::class, 'import'])->name('importReports')->middleware('auth');
Route::post('admin/import-report-individual', [ImportExportIndividualReportsController::class, 'import'])->name('importReportsIndividuals')->middleware('auth');
Route::post('admin/import-report-sit-academic', [ImportExportSitAcademicController::class, 'import'])->name('importReportsSitAcademic')->middleware('auth');
Route::get('admin/informes-cursos-generales', [GeneralReportsController::class, 'reports'])->name('reportsGeneral')->middleware('auth');
Route::get('admin/informes-globales', GlobalReportsComponent::class)->name('globalReports')->middleware('auth');
Route::post('admin/graficar-reportes', [GeneralReportsController::class, 'drawingChart'])->name('generateCharts')->middleware('auth');

Route::get('admin/informes-cursos-individuales', IndividualStudentsComponent::class)->name('reportsIndividual')->middleware('auth');

/* Situación acádemica estudiantes */
Route::get('admin/importar-situacion-academica', SitAcademicStudentsComponent::class)->name('reportsSitAcademicStudents')->middleware('auth');

/* Gestion de usuarios */
Route::get('admin/lista-usuarios', UsersComponent::class)->name('usersList')->middleware('auth','can:usersList.index');