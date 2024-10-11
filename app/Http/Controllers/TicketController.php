<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function orderTicket(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'customer_name' => 'required|string',
            'seat_number' => 'required|string',
        ]);

        $movie = Movie::find($request->movie_id);

        $ticket = Ticket::create([
            'movie_id' => $movie->id,
            'customer_name' => $request->customer_name,
            'seat_number' => $request->seat_number,
            'is_checked_in' => false,
        ]);

        return redirect()->route('movies.ticket', $movie->id)->with('success', 'Ticket has been successfully ordered.');
    }

    public function checkInTicket($id)
    {
        $ticket = Ticket::find($id);

        $ticket->update([
            'is_checked_in' => true,
            'check_in_time' => now(),
        ]);

        return redirect()->route('movies.ticket', $ticket->movie_id)->with('success', 'Ticket has been successfully checked in.');
    }

    public function cancelTicket($id)
    {
        $ticket = Ticket::find($id);

        if ($ticket->is_checked_in) {
            return redirect()->route('movies.ticket', $ticket->movie_id)
                ->with('error', 'Cannot delete a ticket that has already been checked in.');
        }

        $ticket->delete();

        return redirect()->route('movies.ticket', $ticket->movie_id)
            ->with('success', 'Ticket has been successfully canceled.');
    }
}
