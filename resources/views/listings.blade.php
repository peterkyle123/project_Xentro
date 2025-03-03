<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Listings</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Manage Listings</h1>

        <div class="mb-4 flex justify-between items-center">
            <div class="flex space-x-4">
                <a href="{{ route('admin.listings.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
                    Add New Listing
                </a>
                <a href="/admin/dashboard">
                    <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded">
                        Back to Home
                    </button>
                </a>
            </div>

            <form action="{{ route('admin.listings.index') }}" method="GET" class="flex items-center">
                <select name="category" class="border rounded-l-md p-2">
                    <option value="">All Categories</option>
                    <option value="land" {{ request('category') == 'land' ? 'selected' : '' }}>Land</option>
                    <option value="housing" {{ request('category') == 'housing' ? 'selected' : '' }}>Housing</option>
                </select>
                <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}" class="border p-2 mb-2 md:mb-0 w-full md:w-auto">
                <select name="sort" class="border p-2 mb-2 md:mb-0 w-full md:w-auto">
                    <option value="">Sort By</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price (Low to High)</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price (High to Low)</option>
                    <option value="area_asc" {{ request('sort') == 'area_asc' ? 'selected' : '' }}>Area (Small to Large)</option>
                    <option value="area_desc" {{ request('sort') == 'area_desc' ? 'selected' : '' }}>Area (Large to Small)</option>
                </select>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded-r-md p-2 w-full md:w-auto">Search</button>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($listings as $listing)
                <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                    @if ($listing->image)
                        <img src="{{ asset('storage/' . $listing->image) }}" alt="{{ $listing->title }}" class="w-full h-64 object-cover rounded-t-2xl">
                    @endif
                    <div class="p-6">
                        <h2 class="text-xl font-semibold mb-2">{{ $listing->title }}</h2>
                        <p class="text-gray-600 text-sm mb-4">{{ $listing->city }}, {{ $listing->state }}</p>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-lg font-bold text-blue-700">₱{{ number_format($listing->price) }}</span>
                            <span class="text-sm text-gray-500">{{ number_format($listing->area, 0, '.', ',') }} sqft</span>
                        </div>
                @if ($listing->category !== 'Land')
                    <div class="grid grid-cols-2 gap-2 mb-4">
                        <div class="text-center">
                            <span class="block font-semibold text-sm">{{ $listing->bedrooms }}</span>
                            <span class="block text-xs text-gray-500">Beds</span>
                        </div>
                        <div class="text-center">
                            <span class="block font-semibold text-sm">{{ $listing->bathrooms }}</span>
                            <span class="block text-xs text-gray-500">Baths</span>
                        </div>
                    </div>
                @endif
                        <div class="text-center">
                            <a href="{{ route('admin.listings.show', $listing->id) }}" class="inline-flex items-center bg-blue-100 hover:bg-blue-200 text-blue-700 py-2 px-6 rounded-full font-semibold transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                View Full Details
                            </a>
                        </div>
                        <div class="mt-4 flex justify-around items-center">
                            <a href="{{ route('admin.listings.edit', $listing->id) }}" class="text-green-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.listings.destroy', $listing->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            <form action="{{ route('admin.listings.toggleFeatured', $listing->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="{{ $listing->is_featured ? 'text-yellow-600 hover:underline' : 'text-blue-600 hover:underline' }}">
                                    {{ $listing->is_featured ? 'Remove from Featured' : 'Add to Featured' }}
                                </button>
                            </form>
                            <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                            <div class="mt-4 flex justify-around items-center">
                                <span class="text-gray-500">Likes: {{ $listing->likes }}</span>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-6">{{ $listings->links() }}</div>
    </div>
</body>
</html>