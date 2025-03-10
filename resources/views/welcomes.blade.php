<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Real Estate - Find Your Dream Home</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
 <!-- Header -->
 <body class="bg-gray-100">
 <header class="bg-white shadow-md fixed w-full z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-2">
            <!-- Image (JFIF format) -->
            <img src="{{ asset('images/XENTRO ESTATES.jfif') }}" alt="Xentro Estates Logo" class="w-20 h-10 object-cover">
        </a>

            <!-- Navigation Menu (Desktop) -->
            <nav class="hidden md:flex space-x-6">
                <a href="#" class="text-gray-700 hover:text-orange-500 transition duration-300">Home</a>
                <a href="#" class="text-gray-700 hover:text-orange-500 transition duration-300">NGH Subdivision</a>
                <a href="user-listings1" class="text-gray-700 hover:text-orange-500 transition duration-300">Properties</a>
                <a href="/about" class="text-gray-700 hover:text-orange-500 transition duration-300">About Us</a>
                <a href="/contact" class="text-gray-700 hover:text-orange-500 transition duration-300">Contact</a>
                <a href="/user/subdivisions" class="text-gray-700 hover:text-orange-500 transition duration-300">Subdivisions</a>
            </nav>

            <!-- Mobile Menu Button -->
            <button id="menu-toggle" class="md:hidden text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden flex flex-col bg-white shadow-md absolute w-full left-0 top-full z-50">
            <a href="#" class="block py-3 px-4 text-gray-700 hover:bg-gray-100">Home</a>
            <a href="user-listings1" class="block py-3 px-4 text-gray-700 hover:bg-gray-100">Properties</a>
            <a href="/about" class="block py-3 px-4 text-gray-700 hover:bg-gray-100">About Us</a>
            <a href="/contact" class="block py-3 px-4 text-gray-700 hover:bg-gray-100">Contact</a>
            <a href="/user/subdivisions" class="block py-3 px-4 text-gray-700 hover:bg-gray-100">Subdivisions</a>
        </div>
    </header>
    <section class="relative h-[600px] bg-cover bg-center" style="background-image: url({{ asset('images/home.jpg') }});">

        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 text-center text-white flex flex-col justify-center items-center h-full">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Find Your Dream Home</h1>
            <p class="text-lg mb-8">Discover a wide range of properties to suit your needs.</p>
            <a href="/user/subdivisions" class="bg-transparent border border-white text-white hover:bg-black font-semibold py-3 px-8 rounded-full transition duration-300">Check Subvivisions</a>
            <a href="user-listings1" class="bg-transparent border border-white text-white hover:bg-black font-semibold py-3 px-8 rounded-full transition duration-300 mt-4">Browse Properties</a>
        </div>
    </section>

    <section class="py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-semibold text-center mb-8">Featured Properties</h2>

        @if ($featuredListings->isEmpty())
            <p class="text-center text-gray-500">No featured properties available at the moment.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($featuredListings as $listing)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <a href="{{ route('admin.listings.show', $listing->id) }}">
                            @if ($listing->image)
                                <img src="{{ asset('storage/' . $listing->image) }}" alt="{{ $listing->title }}" class="w-full h-64 object-cover">
                            @else
                                <img src="{{ asset('images/default-property.jpg') }}" alt="Default Property" class="w-full h-64 object-cover">
                            @endif
                        </a>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">{{ $listing->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($listing->description, 100) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-blue-500">₱{{ number_format($listing->price) }}</span>
                                <a href="{{ route('user_listings.show', $listing->id) }}" class="text-blue-500 hover:text-blue-600">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>


    <section class="bg-gray-200 py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <h2 class="text-3xl font-semibold mb-4">About Us</h2>
                    <p class="text-gray-700 mb-6">We are a leading real estate agency dedicated to helping you find your dream home. With years of experience and a wide range of properties, we are committed to providing exceptional service and making your real estate journey seamless.</p>
                    <a href="/about" class="bg-yellow-500 hover:bg-yellow-600  text-white font-semibold py-3 px-8 rounded-full transition duration-300">Learn More</a>
                </div>
                <div>
                    <img src="{{ asset('images/Xentro.png') }}" alt="About Us" class="w-full rounded-lg shadow-md">
                </div>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-semibold mb-8">Contact Us</h2>
            <p class="text-gray-700 mb-8">Have questions? Contact us today to learn more about our properties and services.</p>
            <a href="/contact" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 px-8 rounded-full transition duration-300">Contact Us</a>
        </div>
    </section>

    <footer class="bg-yellow-800 text-white py-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Xentro Estates Properties. All rights reserved.</p>
        </div>
    </footer>
    <script>
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
