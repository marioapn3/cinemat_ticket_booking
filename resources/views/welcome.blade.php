<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <!-- Include Header -->
    @include('components.header')

    <main class="container mx-auto text-center mt-20">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Welcome to the Movie List App</h1>
        <p class="text-gray-600 mb-8">Discover your favorite movies and explore details.</p>

        <div class="flex justify-center">
            <a href="{{ route('movies.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">View
                Movies</a>
        </div>
    </main>

    <!-- Include Footer -->
    @include('components.footer')

</body>

</html>
