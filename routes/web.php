<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\UploadController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth','verified'])->group(function(){
	Route::get('/dashboard', function () {
    	return view('dashboard');
	})->name('dashboard');
	Route::view('/about','about')->name('about');

	//testing upload
	// Route::get('/files/create',[UploadController::class,'create']);
	// Route::post('/files',[UploadController::class,'store']);
	// Route::get('/files',[UploadController::class,'index']);
	// Route::get('/files/{id}',[UploadController::class,'show']);
	// Route::get('/file/download/{files}',[UploadController::class,'download']);
});
	//add 'verified for middleware'
Route::middleware('auth')->group(function(){
	Route::get('/dashboard', DashboardController::class,'stats')->name('dashboard');

	Route::prefix('pegawai')->middleware(['permission:create documents'])->group(function(){
		Route::get('create',[DocumentsController::class,'create'])->name('pegawai.create');
		Route::post('create',[DocumentsController::class,'store'])->name('pegawai.store');
		Route::get('table',[DocumentsController::class,'table'])->name('pegawai.table');
		Route::get('table.show.{id}',[DocumentsController::class,'tableshow'])->name('pegawai.table.show');
		Route::get('mydoc',[DocumentsController::class,'tablemydoc'])->name('pegawai.mydoc');
		Route::get('details',[UploadController::class,'show'])->name('pegawai.details');
		//
		Route::get('mydoc.show.{id}',[DocumentsController::class,'pegawaishow'])->name('pegawai.mydoc.show');
		Route::get('mydoc.edit.{id}',[DocumentsController::class,'pegawaiedit'])->name('pegawai.mydoc.edit');
		Route::post('update.{id}',[DocumentsController::class,'pegawaiupdate'])->name('pegawai.update');
		Route::get('delete.{id}',[DocumentsController::class,'delete'])->name('pegawai.delete');
		//
		Route::get('table.cari',[DocumentsController::class,'cari'])->name('pegawai.table.cari');
		Route::get('mydoc.carimydoc',[DocumentsController::class,'carimydoc'])->name('pegawai.mydoc.carimydoc');
	});

	Route::prefix('admin')->middleware(['role:admin'])->group(function(){
		Route::get('manage',[DocumentsController::class,'manage'])->name('admin.manage');
		Route::get('proses',[DocumentsController::class,'proses'])->name('admin.proses');
		Route::get('diterima',[DocumentsController::class,'diterima'])->name('admin.diterima');
		Route::get('showusers',[DocumentsController::class,'showusers'])->name('admin.showusers');
		Route::get('showusers.cari',[DocumentsController::class,'carishowusers'])->name('admin.showusers.cari');
		//
		Route::get('manage.edit.{id}',[DocumentsController::class,'edit'])->name('admin.manage.edit');
		Route::post('update.{id}',[DocumentsController::class,'update'])->name('admin.update');
		Route::get('delete.{id}',[DocumentsController::class,'delete'])->name('admin.delete');
		Route::get('manage.show.{id}',[DocumentsController::class,'show'])->name('admin.manage.show');
		//
		Route::get('manage.cari',[DocumentsController::class,'cariadmin'])->name('admin.manage.cari');
		//
		Route::get('export',[DocumentsController::class,'export'])->name('admin.export');
	});
});


require __DIR__.'/auth.php';
