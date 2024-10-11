<!-- resources/views/movies/book.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Ticket for {{ $movie->title }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <!-- Include Header -->
    @include('components.header')

    <main class="container mx-auto mt-8">
        <h2 class="text-2xl font-semibold mb-4">Book a Ticket for {{ $movie->title }}</h2>

        <form action="{{ route('ticket.order') }}" method="POST"
            class="bg-white p-6 rounded shadow-md w-full max-w-lg mx-auto">
            @csrf
            <input type="hidden" name="movie_id" value="{{ $movie->id }}">

            <div class="mb-4">
                <label for="customer_name" class="block text-gray-700 font-bold mb-2">Customer Name</label>
                <input type="text" id="customer_name" name="customer_name"
                    class="w-full p-2 border border-gray-300 rounded">
            </div>

            <div class="mb-4">
                <label for="seat_number" class="block text-gray-700 font-bold mb-2">Seat Number</label>
                <input type="text" id="seat_number" name="seat_number"
                    class="w-full p-2 border border-gray-300 rounded" maxlength="5">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">Book
                    Ticket</button>
            </div>
        </form>
    </main>

    <!-- Include Footer -->
    @include('components.footer')
    @include('components.toast')

</body>

</html>
