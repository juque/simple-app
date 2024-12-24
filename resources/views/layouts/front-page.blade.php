<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

				@vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100">

  <div class="container mx-auto max-w-2xl shadow-lg bg-white p-4 mt-10">

		<h1 class="text-center font-black text-6xl text-center mb-10">App</h1>

    {{ $slot }}

  </div>

</body>

</html>
