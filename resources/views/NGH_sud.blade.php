<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGH_Subdivision</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <!-- Hero Section -->
    <section class="relative h-[500px] bg-cover bg-center flex items-center justify-center text-white text-center" 
        style="background-image: url('{{ asset('images/28.png') }}'); background-size: cover; background-position: center;">
        </div>
    </section>


    <!-- About Section -->
    <section class="py-12 px-6 max-w-5xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800">About NGH Subdivision</h2>
        <p class="mt-4 text-gray-600">
            NGH Subdivision offers a serene and secure environment for families looking for their dream home. 
            Located in a prime areas, it features modern amenities and a well-planned community layout.
        </p>
    </section>

    

    <!-- Image Gallery -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-gray-800 text-center">Gallery</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-6">
                <img src="{{ asset('images/ngh1.jpg') }}" alt="NGH Image 1" class="rounded-lg shadow-md">
                <img src="{{ asset('images/ngh2.jpg') }}" alt="NGH Image 2" class="rounded-lg shadow-md">
                <img src="{{ asset('images/ngh3.jpg') }}" alt="NGH Image 3" class="rounded-lg shadow-md">
            </div>
        </div>
    </section>

    <!-- Sites Section -->
    <section class="py-12 px-6 max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 text-center">Nearby Sites</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            <a href="#" class="block relative group">
                <img src="{{ asset('images/site1.jpg') }}" alt="Site 1" class="rounded-lg shadow-md group-hover:opacity-75 transition-opacity">
                <p class="absolute bottom-2 left-2 bg-black bg-opacity-50 text-white px-3 py-1 rounded">Site 1</p>
            </a>
            <a href="#" class="block relative group">
                <img src="{{ asset('images/site2.jpg') }}" alt="Site 2" class="rounded-lg shadow-md group-hover:opacity-75 transition-opacity">
                <p class="absolute bottom-2 left-2 bg-black bg-opacity-50 text-white px-3 py-1 rounded">Site 2</p>
            </a>
            <a href="#" class="block relative group">
                <img src="{{ asset('images/site3.jpg') }}" alt="Site 3" class="rounded-lg shadow-md group-hover:opacity-75 transition-opacity">
                <p class="absolute bottom-2 left-2 bg-black bg-opacity-50 text-white px-3 py-1 rounded">Site 3</p>
            </a>
        </div>
    </section>

    <!-- Amenities Section -->
    <section class="py-12 px-6 max-w-5xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800">Amenities</h2>
        <ul class="list-disc list-inside mt-4 text-gray-600">
            <li>24/7 Security</li>
            <li>Clubhouse & Swimming Pool</li>
            <li>Parks & Playground</li>
            <li>Gated Community</li>
            <li>Accessible to Schools, Malls, and Hospitals</li>
        </ul>
    </section>

    <!-- Location -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-gray-800 text-center">Location</h2>
            <div class="mt-6">
                <iframe class="w-full h-[400px] rounded-lg shadow-md"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345093686!2d123.80647460908322!3d10.614042823684866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTAuNjE0MDQyODIzNjg0ODY2LCAxMjMuODA2NDc0NjA5MDgzMjI!5e0!3m2!1sen!2sph!4v1649760210234!5m2!1sen!2sph" 
                    allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-12 px-6 max-w-5xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800">Get in Touch</h2>
        <p class="mt-4 text-gray-600">For inquiries, visit our office or contact us:</p>
        <p class="mt-2 font-semibold">📞 Contact Number: +63 912 345 6789</p>
        <p class="font-semibold">📍 Address: NGH Subdivision, City, Philippines</p>
    </section>
       <!-- Hero Section -->
       <section class="relative h-[500px] bg-cover bg-center flex items-center justify-center text-white text-center" 
        style="background-image: url('{{ asset('images/home.jpg') }}'); background-size: cover; background-position: center;">
        <div class="bg-black bg-opacity-30 p-6 rounded-lg backdrop-blur-sm">
            <h1 class="text-4xl font-bold">Welcome to NGH Subdivision</h1>
            <p class="text-lg mt-2">A premier community designed for comfort, security, and modern living.</p>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-12 px-6 max-w-5xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800">About NGH Subdivision</h2>
        <p class="mt-4 text-gray-600">
            NGH Subdivision offers a serene and secure environment for families looking for their dream home. 
            Located in a prime area, it features modern amenities and a well-planned community layout.
        </p>
    </section>

    <!-- Image Gallery -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-gray-800 text-center">Gallery</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-6">
                <img src="{{ asset('images/ngh1.jpg') }}" alt="NGH Image 1" class="rounded-lg shadow-md">
                <img src="{{ asset('images/ngh2.jpg') }}" alt="NGH Image 2" class="rounded-lg shadow-md">
                <img src="{{ asset('images/ngh3.jpg') }}" alt="NGH Image 3" class="rounded-lg shadow-md">
            </div>
        </div>
    </section>

    <!-- Sites Section -->
    <section class="py-12 px-6 max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 text-center">Nearby Sites</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            <a href="#" class="block relative group">
                <img src="{{ asset('images/site1.jpg') }}" alt="Site 1" class="rounded-lg shadow-md group-hover:opacity-75 transition-opacity">
                <p class="absolute bottom-2 left-2 bg-black bg-opacity-50 text-white px-3 py-1 rounded">Site 1</p>
            </a>
            <a href="#" class="block relative group">
                <img src="{{ asset('images/site2.jpg') }}" alt="Site 2" class="rounded-lg shadow-md group-hover:opacity-75 transition-opacity">
                <p class="absolute bottom-2 left-2 bg-black bg-opacity-50 text-white px-3 py-1 rounded">Site 2</p>
            </a>
            <a href="#" class="block relative group">
                <img src="{{ asset('images/site3.jpg') }}" alt="Site 3" class="rounded-lg shadow-md group-hover:opacity-75 transition-opacity">
                <p class="absolute bottom-2 left-2 bg-black bg-opacity-50 text-white px-3 py-1 rounded">Site 3</p>
            </a>
        </div>
    </section>

    <!-- Amenities Section -->
    <section class="py-12 px-6 max-w-5xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800">Amenities</h2>
        <ul class="list-disc list-inside mt-4 text-gray-600">
            <li>24/7 Security</li>
            <li>Clubhouse & Swimming Pool</li>
            <li>Parks & Playground</li>
            <li>Gated Community</li>
            <li>Accessible to Schools, Malls, and Hospitals</li>
        </ul>
    </section>

    <!-- Location -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-gray-800 text-center">Location</h2>
            <div class="mt-6">
                <iframe class="w-full h-[400px] rounded-lg shadow-md"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345093686!2d123.80647460908322!3d10.614042823684866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTAuNjE0MDQyODIzNjg0ODY2LCAxMjMuODA2NDc0NjA5MDgzMjI!5e0!3m2!1sen!2sph!4v1649760210234!5m2!1sen!2sph" 
                    allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-12 px-6 max-w-5xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800">Get in Touch</h2>
        <p class="mt-4 text-gray-600">For inquiries, visit our office or contact us:</p>
        <p class="mt-2 font-semibold">📞 Contact Number: +63 912 345 6789</p>
        <p class="font-semibold">📍 Address: NGH Subdivision, City, Philippines</p>
    </section>


</body>
</html>
