<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
<div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Listing Details</h1>

        <div class="mb-4">
            <p><strong>Title:</strong> {{ $listing->title }}</p>
            <p><strong>Description:</strong> {{ $listing->description }}</p>
            <p><strong>Type:</strong> {{ $listing->type }}</p>
            <p><strong>Price:</strong> {{ $listing->price }}</p>
            <p><strong>Address:</strong> {{ $listing->address }}</p>
            <p><strong>City:</strong> {{ $listing->city }}</p>
            <p><strong>State:</strong> {{ $listing->state }}</p>
            <p><strong>Zip:</strong> {{ $listing->zip }}</p>
            <p><strong>Bedrooms:</strong> {{ $listing->bedrooms }}</p>
            <p><strong>Bathrooms:</strong> {{ $listing->bathrooms }}</p>
            <p><strong>Area:</strong> {{ $listing->area }}</p>
            <p><strong>Status:</strong> {{ $listing->status }}</p>
            <p><strong>Created At:</strong> {{ $listing->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $listing->updated_at }}</p>
        </div>

        <a href="{{ route('admin.listings.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded">Back to Listings</a>
    </div>
</body>
</html>