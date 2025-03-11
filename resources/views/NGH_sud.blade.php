<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGH Subdivision</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-50">

    @if ($subdivision)
        <!-- Hero Section (Responsive) -->
        <section class="relative h-[300px] md:h-[450px] lg:h-[500px] bg-cover bg-center flex items-center justify-center text-white text-center"
            style="background-image: url('{{ asset('storage/' . $subdivision->image) }}'); background-size: cover; background-position: center;">
        </section>

        <!-- About Section -->
        <section class="py-10 px-4 md:px-6 max-w-5xl mx-auto">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800">About {{ $subdivision->sub_name }}</h2>
            <p class="mt-3 md:mt-4 text-gray-600 text-sm md:text-base">
                {{ $subdivision->description }}
            </p>
        </section>

        <!-- Subdivision Details -->
        <section class="py-10 bg-gray-100">
            <div class="max-w-5xl mx-auto px-4 md:px-6 text-center">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800">{{ $subdivision->sub_name }}</h2>
                <p class="mt-2 text-gray-700 text-sm md:text-base"><strong>Blocks:</strong> {{ $subdivision->block_number }}</p>
                <p class="text-gray-700 text-sm md:text-base"><strong>Houses:</strong> {{ $subdivision->house_number }}</p>
            </div>
        </section>
    @else
        <p class="text-center text-red-500 font-semibold mt-10">Subdivision not found.</p>
    @endif

    <!-- Contact Section -->
    <section class="py-10 px-4 md:px-6 max-w-5xl mx-auto text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800">Get in Touch</h2>
        <p class="mt-3 md:mt-4 text-gray-600 text-sm md:text-base">For inquiries, visit our office or contact us:</p>
        <p class="mt-2 font-semibold text-sm md:text-base">📞 Contact Number: +63 912 345 6789</p>
        <p class="font-semibold text-sm md:text-base">📍 Address: NGH Subdivision, City, Philippines</p>
    </section>

    <!-- Inquire Button -->
    <a href="{{ route('sub_queries.create', ['subdivision_id' => $subdivision->id]) }}"
        class="bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition">
         Submit Sub Query
     </a>




</body>
</html>
