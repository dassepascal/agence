<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

$idRegex = '[0-9]+';
$slugRegex = '[a-z0-9\-]+';

Route::get('/', [HomeController::class,'index']);
Route::get('/biens',[App\Http\Controllers\PropertyController::class,'index'])->name('property.index');
Route::get('/biens/{slug}',[App\Http\Controllers\PropertyController::class,'show'])->name('property.show')->where('property',$idRegex)->where('slug',$slugRegex);

Route::post('/biens/{property}/contact',[App\Http\Controllers\PropertyController::class,'contact'])->name('property.contact')->where(['property'=>$idRegex]);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('property',\App\Http\Controllers\Admin\PropertyController::class)->except(['show']);
    Route::resource('option',\App\Http\Controllers\Admin\OptionController::class)->except(['show']);
});
