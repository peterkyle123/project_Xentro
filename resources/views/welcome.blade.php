<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Real Estate - Find Your Dream Home</title>
    @vite('resources/css/app.css')
</head>
<header class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="#" class="text-2xl font-bold text-blue-600">Your Real Estate</a>
            
            <!-- Navigation Menu -->
            <nav class="hidden md:flex space-x-6">
                <a href="#" class="text-gray-700 hover:text-blue-500 transition duration-300">Home</a>
                <a href="#" class="text-gray-700 hover:text-blue-500 transition duration-300">Properties</a>
                <a href="#" class="text-gray-700 hover:text-blue-500 transition duration-300">About Us</a>
                <a href="#" class="text-gray-700 hover:text-blue-500 transition duration-300">Contact</a>
            </nav>
            
            <!-- Mobile Menu Button -->
            <button id="menu-toggle" class="md:hidden text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md absolute w-full left-0 top-16">
            <a href="#" class="block py-3 px-4 text-gray-700 hover:bg-gray-100">Home</a>
            <a href="#" class="block py-3 px-4 text-gray-700 hover:bg-gray-100">Properties</a>
            <a href="#" class="block py-3 px-4 text-gray-700 hover:bg-gray-100">About Us</a>
            <a href="#" class="block py-3 px-4 text-gray-700 hover:bg-gray-100">Contact</a>
        </div>
    </header>
<body class="bg-gray-100">

    <section class="relative h-[600px] bg-cover bg-center" style="background-image: url('{{ asset('images/home.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 text-center text-white flex flex-col justify-center items-center h-full">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Find Your Dream Home</h1>
            <p class="text-lg mb-8">Discover a wide range of properties to suit your needs.</p>
            <a href="#" class="bg-transparent border border-white text-white hover:bg-black font-semibold py-3 px-8 rounded-full transition duration-300">Browse Properties</a>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-semibold text-center mb-8">Featured Properties</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <a href="#">
                        <img src="{{ asset('images/property1.jpg') }}" alt="Property 1" class="w-full h-64 object-cover">
                    </a>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Luxury Villa in Cebu</h3>
                        <p class="text-gray-600 mb-4">4 Bedrooms, 3 Bathrooms, Pool, and Garden.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-blue-500">$500,000</span>
                            <a href="#" class="text-blue-500 hover:text-blue-600">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <a href="#">
                        <img src="{{ asset('images/property2.jpg') }}" alt="Property 2" class="w-full h-64 object-cover">
                    </a>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Modern Apartment in City Center</h3>
                        <p class="text-gray-600 mb-4">2 Bedrooms, Balcony, and City View.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-blue-500">$300,000</span>
                            <a href="#" class="text-blue-500 hover:text-blue-600">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <a href="#">
                        <img src="{{ asset('images/property3.jpg') }}" alt="Property 3" class="w-full h-64 object-cover">
                    </a>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Family Home with Large Yard</h3>
                        <p class="text-gray-600 mb-4">3 Bedrooms, Spacious Living Area, and Garden.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-blue-500">$400,000</span>
                            <a href="#" class="text-blue-500 hover:text-blue-600">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-200 py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <h2 class="text-3xl font-semibold mb-4">About Us</h2>
                    <p class="text-gray-700 mb-6">We are a leading real estate agency dedicated to helping you find your dream home. With years of experience and a wide range of properties, we are committed to providing exceptional service and making your real estate journey seamless.</p>
                    <a href="#" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-8 rounded-full transition duration-300">Learn More</a>
                </div>
                <div>
                    <img src="{{ asset('images/about-us.jpg') }}" alt="About Us" class="w-full rounded-lg shadow-md">
                </div>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-semibold mb-8">Contact Us</h2>
            <p class="text-gray-700 mb-8">Have questions? Contact us today to learn more about our properties and services.</p>
            <a href="#" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-3 px-8 rounded-full transition duration-300">Contact Us</a>
        </div>
    </section>

    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Your Real Estate. All rights reserved.</p>
        </div>
    </footer>
    <script>
         document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>

</body>
</html>