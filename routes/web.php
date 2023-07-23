<?php

use App\Http\Controllers\CoursesReports\GeneralReportsController;
use App\Http\Controllers\CoursesReports\ImportExportReportGeneralController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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


Route::get('escritorio', [App\Http\Controllers\HomeController::class, 'index'])->name('escritorio');
Route::get('/informes-cursos', [GeneralReportsController::class, 'index'])->name('reportsGeneral')->middleware('auth');
//Route::post('/import', [ImportExportReportGeneralController::class, 'import'])->name('importReports')->middleware('auth');

//Route::get('export', 'export')->name('export');
Route::controller(ImportExportReportGeneralController::class)->group(function(){
    Route::get('/importar-informes', 'index')->name('importReportsGeneral')->middleware('auth');
    Route::get('reports-export', 'export')->name('users.export');
    Route::post('reports-import', 'import')->name('importReports');
    
});