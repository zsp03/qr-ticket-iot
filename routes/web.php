<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('scan');
});

Route::get('/generate', function () {
    $tickets = \App\Models\Ticket::all();
    foreach ($tickets as $ticket){
        QrCode::size(200)->generate($ticket->code, '../public/qrcodes/'."$ticket->id".'.svg');
    }
});

Route::get('/find/{id}', function ($id) {
    $ticket = \App\Models\Ticket::where('code', $id)->firstOrFail();
    broadcast(new \App\Events\TestEvent($ticket));
    return $ticket;
});
