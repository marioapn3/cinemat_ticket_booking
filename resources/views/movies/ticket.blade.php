<!-- resources/views/movies/ticket.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets for {{ $movie->title }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <!-- Include Header -->
    @include('components.header')

    <main class="container mx-auto mt-8">
        <h2 class="text-2xl font-semibold mb-4">Tickets for {{ $movie->title }}</h2>
        <p class="text-gray-600 mb-8">List of all tickets booked for this movie.</p>

        <table class="min-w-full bg-white shadow-md rounded">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Customer Name</th>
                    <th class="py-3 px-6 text-left">Seat Number</th>
                    <th class="py-3 px-6 text-left">Checked In</th>
                    <th class="py-3 px-6 text-left">Check-In Time</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
                @forelse ($movie->tickets as $ticket)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6">{{ $ticket->customer_name }}</td>
                        <td class="py-3 px-6">{{ $ticket->seat_number }}</td>
                        <td class="py-3 px-6">{{ $ticket->is_checked_in ? 'Yes' : 'No' }}</td>
                        <td class="py-3 px-6">
                            {{ $ticket->check_in_time ? \Carbon\Carbon::parse($ticket->check_in_time)->format('F d, Y H:i') : '-' }}
                        </td>

                        <td class="py-3 px-6 flex space-x-2">
                            @if (!$ticket->is_checked_in)
                                <form action="{{ route('ticket.check-in', $ticket->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded">Check
                                        In</button>
                                </form>
                            @endif

                            <form action="{{ route('ticket.cancel', $ticket->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                @if (!$ticket->is_checked_in)
                                    <button type="submit"
                                        class="bg-red-500 text-white px-4 py-1 rounded">Cancel</button>
                                @endif
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-3 px-6 text-center">No tickets found for this movie.</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </main>

    <!-- Include Footer -->
    @include('components.footer')
    @include('components.toast')
</body>

</html>
