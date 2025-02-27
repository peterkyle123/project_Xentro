<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $listing->title }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">{{ $listing->title }}</h1>

        @if ($listing->image)
            <img src="{{ asset('storage/' . $listing->image) }}" alt="{{ $listing->title }}" class="w-full h-64 object-cover rounded-2xl mb-4">
        @endif

        <p class="mb-2"><strong>Price:</strong> ₱{{ number_format($listing->price) }}</p>
        <p class="mb-2"><strong>Address:</strong> {{ $listing->address }}, {{ $listing->city }}, {{ $listing->state }} {{ $listing->zip }}</p>
        <p class="mb-2"><strong>Bedrooms:</strong> {{ $listing->bedrooms }}</p>
        <p class="mb-2"><strong>Bathrooms:</strong> {{ $listing->bathrooms }}</p>
        <p class="mb-2"><strong>Area:</strong> {{ $listing->area }} sqft</p>
        <p class="mb-2"><strong>Category:</strong> {{ $listing->category }}</p>
        <p class="mb-2"><strong>Housing Type:</strong> {{ $listing->housing_type }}</p>
        @if ($listing->custom_housing_type)
            <p class="mb-2"><strong>Custom Housing Type:</strong> {{ $listing->custom_housing_type }}</p>
        @endif
        <p class="mb-2"><strong>Type:</strong> {{ $listing->type }}</p>
        <p class="mb-2"><strong>Status:</strong> {{ $listing->status }}</p>
        <p class="mb-2"><strong>Description:</strong> {{ $listing->description }}</p>
        <a href="/user-listings" class="mt-4 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">Back to Listings</a>
    </div>
</body>
</html>