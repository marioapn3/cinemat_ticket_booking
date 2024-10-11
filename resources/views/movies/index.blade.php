<!-- resources/views/movies/index.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <!-- Include Header -->
    @include('components.header')

    <main class="container mx-auto mt-8">
        <h2 class="text-xl font-semibold mb-4">List of Movies</h2>

        <table class="min-w-full bg-white shadow-md rounded">
            <thead>
                <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Title</th>
                    <th class="py-3 px-6 text-left">Duration (min)</th>
                    <th class="py-3 px-6 text-left">Release Date</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
                @foreach ($movies as $movie)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">{{ $movie->title }}</td>
                        <td class="py-3 px-6 text-left">{{ $movie->duration }} min</td>
                        <td class="py-3 px-6 text-left">
                            {{ \Carbon\Carbon::parse($movie->release_date)->format('F d, Y') }}
                        </td>
                        <td class="py-3 px-6 text-left">
                            <a href="{{ route('movies.ticket', $movie->id) }}"
                                class="text-blue-600 hover:underline mr-4">View Tickets</a>
                            <a href="{{ route('movies.book', $movie->id) }}" class="text-green-600 hover:underline">Book
                                Ticket</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <!-- Include Footer -->
    @include('components.footer')
    @include('components.toast')
</body>

</html>
