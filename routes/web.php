<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InboundController;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\OutboundController;
use App\Http\Controllers\Poseidon;
use App\Http\Controllers\Livefeed;


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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function ()
{

    //Route::get('home', 'HomeController@index')->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/clients', [ClientsController::class, 'index'])->name('clients');
    Route::get('/clients/create', [ClientsController::class, 'create'])->name('clients');
    Route::post('/clients', [ClientsController::class, 'store'])->name('clients');
    //Route::post('/clients/find', [ClientsController::class, 'getClient'])->name('clients.find');

    Route::get('/clients/{client}', [ClientsController::class, 'show'])->name('clients');
    Route::patch('/clients/{client}', [ClientsController::class, 'update'])->name('clients');
    Route::delete('/clients/{client}', [ClientsController::class, 'destroy'])->name('clients.destroy');

    Route::get('/inbounds', [InboundController::class, 'index'])->name('inbounds');
    Route::get('/inbounds/create', [InboundController::class, 'create'])->name('inbounds');
    Route::post('/inbounds', [InboundController::class, 'store'])->name('inbounds');
    Route::get('/inbounds/{inbound}', [InboundController::class, 'show'])->name('inbounds');
    Route::patch('/inbounds/{inbound}', [InboundController::class, 'update'])->name('inbounds');
    Route::delete('/inbounds/{inbound}', [InboundController::class, 'destroy'])->name('inbounds.destroy');

    Route::get('/stocks', [StocksController::class, 'index'])->name('stocks');
    Route::post('/inbounds', [InboundController::class, 'store'])->name('stocks');

    Route::patch('/stocks/{stock}', [StocksController::class, 'update'])->name('stocks');


    Route::get('/outbounds', [OutboundController::class, 'index'])->name('outbounds');
    //Route::get('/outbounds/create', [OutboundController::class, 'create'])->name('outbounds');
    Route::get('/outbounds/create/{outbound}', [OutboundController::class, 'show'])->name('outbounds');
    Route::post('/outbounds/create/{stockID}', [OutboundController::class, 'store'])->name('outbounds');
    Route::delete('/outbounds/{outbound}', [OutboundController::class, 'destroy'])->name('outbounds.destroy');

    Route::get('/outbounds/{outbound}', [OutboundController::class, 'showedit'])->name('outbounds');
    Route::patch('/outbounds/{outbound}', [OutboundController::class, 'update'])->name('outbounds');

    Route::get('/poseidon', [Poseidon::class, 'index'])->name('poseidon');
    Route::get('/livefeed', [Livefeed::class, 'index'])->name('livefeed');

});

