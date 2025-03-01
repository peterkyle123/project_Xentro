<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8 max-w-4xl">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-gray-800">About Our Company</h1>
            <p class="mt-2 text-lg text-gray-600">We strive for excellence in everything we do.</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-lg mb-8">
            <h2 class="text-2xl font-semibold text-gray-700">Our Mission</h2>
            <p class="text-gray-600 mt-2">
                To provide high-quality products and services that meet the needs of our customers and exceed their expectations.
            </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-lg mb-8">
            <h2 class="text-2xl font-semibold text-gray-700">Our Vision</h2>
            <p class="text-gray-600 mt-2">
                To provide high-quality products and services that meet the needs of our customers and exceed their expectations.
            </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-lg mb-8">
            <h2 class="text-2xl font-semibold text-gray-700">Our Goal</h2>
            <p class="text-gray-600 mt-2">
                To provide high-quality products and services that meet the needs of our customers and exceed their expectations.
            </p>
        </div>


        <div class="bg-white p-6 rounded-xl shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-700">Our Team</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
  
            @foreach($teamMembers as $member)
                <div class="bg-gray-50 p-4 rounded-lg shadow-md text-center">
                    <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="w-32 h-32 mx-auto rounded-full object-cover mb-3">
                    <h3 class="font-semibold text-lg text-gray-800">{{ $member->name }}</h3>
                    <p class="text-sm text-gray-600">{{ $member->position }}</p>
                </div>
            @endforeach
      
    </div>
</div>

</body>
</html>
