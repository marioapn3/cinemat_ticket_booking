<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{id}/ticket', [MovieController::class, 'ticketMovie'])->name('movies.ticket');
Route::get('/movies/{id}/book', [MovieController::class, 'bookMovie'])->name('movies.book');

Route::post('/ticket/order', [TicketController::class, 'orderTicket'])->name('ticket.order');
Route::post('/ticket/{id}/check-in', [TicketController::class, 'checkInTicket'])->name('ticket.check-in');
Route::delete('/ticket/{id}/cancel', [TicketController::class, 'cancelTicket'])->name('ticket.cancel');
