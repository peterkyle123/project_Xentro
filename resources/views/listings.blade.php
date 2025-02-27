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
        <h1 class="text-2xl font-semibold mb-4">Manage Listings</h1>

        <div class="mb-4">
            <a href="{{ route('admin.listings.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">Add New Listing</a>
        </div>

        <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
    <thead>
        <tr>
            <th class="py-2 px-4 border-b">Title</th>
            <th class="py-2 px-4 border-b">Type</th>
            <th class="py-2 px-4 border-b">Category</th>
            <th class="py-2 px-4 border-b">Housing Type (if housing)</th>
            <th class="py-2 px-4 border-b">Price</th>
            <th class="py-2 px-4 border-b">Address</th>
            <th class="py-2 px-4 border-b">Location</th> <th class="py-2 px-4 border-b">Zip</th>
            <th class="py-2 px-4 border-b">Bedrooms</th>
            <th class="py-2 px-4 border-b">Bathrooms</th>
            <th class="py-2 px-4 border-b">Area</th>
            <th class="py-2 px-4 border-b">Status</th>
            <th class="py-2 px-4 border-b">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listings as $listing)
            <tr>
                <td class="py-2 px-4 border-b">{{ $listing->title }}</td>
                <td class="py-2 px-4 border-b">{{ $listing->type }}</td>
                <td class="py-2 px-4 border-b">{{ $listing->category }}</td>
                <td class="py-2 px-4 border-b">
                    {{ $listing->housing_type === 'Other' ? $listing->custom_housing_type : $listing->housing_type }}
                </td>

                <td class="py-2 px-4 border-b">{{ $listing->price }}</td>
                <td class="py-2 px-4 border-b">{{ $listing->address }}</td>
                <td class="py-2 px-4 border-b">{{ $listing->city }}, {{ $listing->state }}</td> <td class="py-2 px-4 border-b">{{ $listing->zip }}</td>
                <td class="py-2 px-4 border-b">{{ $listing->bedrooms }}</td>
                <td class="py-2 px-4 border-b">{{ $listing->bathrooms }}</td>
                <td class="py-2 px-4 border-b">{{ $listing->area }}</td>
                <td class="py-2 px-4 border-b">{{ $listing->status }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('admin.listings.show', $listing->id) }}" class="text-blue-600 hover:underline mr-2">View</a>
                    <a href="{{ route('admin.listings.edit', $listing->id) }}" class="text-green-600 hover:underline mr-2">Edit</a>
                    <form action="{{ route('admin.listings.destroy', $listing->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
        </div>
        <div class="mt-4">
            {{ $listings->links() }}
        </div>
    </div>
 
</body>
</html>