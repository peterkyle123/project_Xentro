<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listings</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .like-button {
            z-index: 1000;
            position: relative;
        }
    </style>
</head>
<body class="bg-gray-100 pt-20"> <!-- Added padding to prevent overlap -->
    <header class="bg-white shadow-md fixed w-full z-50 top-0"> <!-- Fixed header -->
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="flex items-center space-x-2">
                <img src="{{ asset('images/XENTRO ESTATES.jfif') }}" alt="Xentro Estates Logo" class="w-20 h-10 object-cover">
            </a>
            <nav class="hidden md:flex space-x-6">
                <a href="#" class="text-gray-700 hover:text-orange-500 transition duration-300">Home</a>
                <a href="#" class="text-gray-700 hover:text-orange-500 transition duration-300">NGH Subdivision</a>
                <a href="user-listings1" class="text-gray-700 hover:text-orange-500 transition duration-300">Properties</a>
                <a href="/about" class="text-gray-700 hover:text-orange-500 transition duration-300">About Us</a>
                <a href="/contact" class="text-gray-700 hover:text-orange-500 transition duration-300">Contact</a>
                <a href="/user/subdivisions" class="text-gray-700 hover:text-orange-500 transition duration-300">Subdivisions</a>
            </nav>
            <button id="menu-toggle" class="md:hidden text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
        <div id="mobile-menu" class="hidden flex flex-col bg-white shadow-md absolute w-full left-0 top-full z-50">
            <a href="#" class="block py-3 px-4 text-gray-700 hover:bg-gray-100">Home</a>
            <a href="user-listings1" class="block py-3 px-4 text-gray-700 hover:bg-gray-100">Properties</a>
            <a href="/about" class="block py-3 px-4 text-gray-700 hover:bg-gray-100">About Us</a>
            <a href="/contact" class="block py-3 px-4 text-gray-700 hover:bg-gray-100">Contact</a>
            <a href="/user/subdivisions" class="block py-3 px-4 text-gray-700 hover:bg-gray-100">Subdivisions</a>
        </div>
    </header>

    <div class="container mx-auto p-4"> <!-- Removed duplicate mt-20 -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-4">
            <div class="flex items-center space-x-4">
            </div>

            <form action="{{ route('user_listings.index') }}" method="GET" class="flex flex-col md:flex-row items-center w-full md:w-auto mt-4 md:mt-0">
                <select name="category" class="border rounded-l-md p-2 mb-2 md:mb-0 md:rounded-r-none w-full md:w-auto">
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

                        <div class="flex justify-between items-center">
                            <a href="{{ route('user_listings.show', $listing->id) }}" class="inline-flex items-center bg-blue-100 hover:bg-blue-200 text-blue-700 py-2 px-6 rounded-full font-semibold transition-colors duration-300">
                                View Full Details
                            </a>
                            <button class="like-button" data-listing-id="{{ $listing->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 006.364 6.364L12 20.364l1.318-1.318a4.5 4.5 0 006.364-6.364A4.5 4.5 0 0017.68 2.34L12 7.66l-5.682-5.32A4.5 4.5 0 004.318 6.318z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.like-button').click(function() {
                console.log('Button clicked');
                const listingId = $(this).data('listing-id');
                const button = $(this);
                $.ajax({
                    url: '/listings/' + listingId + '/like',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log('AJAX success:', response);
                        if (response.liked) {
                            button.find('svg').attr('fill', 'red');
                        } else {
                            button.find('svg').attr('fill', 'none');
                        }
                        $('#likes-count-' + listingId).text(response.likes);
                    },
                    error: function(error) {
                        console.error('Error liking listing:', error);
                    }
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            const menuToggle = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');

            menuToggle.addEventListener('click', function () {
                if (mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.remove('hidden');
                    mobileMenu.classList.add('flex');
                } else {
                    mobileMenu.classList.remove('flex');
                    mobileMenu.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
