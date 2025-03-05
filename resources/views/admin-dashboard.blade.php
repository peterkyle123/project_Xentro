<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="flex flex-col h-screen">
    <header class="bg-white text-orange-950 p-4 flex justify-between items-center shadow-md">
    <!-- Logo and Title -->
    <a href="/" class="flex items-center space-x-2">
        <!-- Image (JFIF format) -->
       <img src="{{ asset('images/XENTRO ESTATES.jfif') }}" alt="Xentro Estates Logo" class="w-42 h-18 object-cover">

    </a>

    <!-- Navigation Menu -->
    <nav class="flex items-center space-x-4">
        <a href="/" class="hover:text-orange-950">Website</a>
        <a href="/ngh-subdivision" class="hover:text-orange-950">NGH Subdivision</a>
        <a href="/create-team" class="hover:text-orange-950">Team</a>
        <a href="/admin/listings" class="hover:text-orange-950">Listings</a>
        <a href="/admin/inquiries" class="hover:text-orange-950">Inquiries</a>
        <a href="/admin-edit" class="hover:text-orange-950">Account</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">Logout</button>
        </form>
    </nav>
</header>


        <main class="flex-1 bg-gray-50 p-8">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-semibold">Welcome to the Admin Dashboard</h3>

                <div class="mt-8">
                    <div class="relative w-full overflow-hidden rounded-lg" data-carousel>
                        <div class="relative h-150">
                            <div class="absolute inset-0 transition-opacity duration-700 ease-in-out" data-carousel-item="active">
                                <img src="{{ asset('images/home.jpg') }}" class="absolute block w-full h-full object-cover" alt="Slide 1">
                            </div>
                            <div class="absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0" data-carousel-item>
                                <img src="{{ asset('images/M2.jpg') }}" class="absolute block w-full h-full object-cover" alt="Slide 2">
                            </div>
                            <div class="absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0" data-carousel-item>
                                <img src="{{ asset('images/M3.jpg') }}" class="absolute block w-full h-full object-cover" alt="Slide 3">
                            </div>
                        </div>
                        <div class="absolute bottom-5 left-1/2 transform -translate-x-1/2 space-x-3">
                            <button type="button" class="w-3 h-3 rounded-full bg-gray-500" data-carousel-slide-to="0"></button>
                            <button type="button" class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-500" data-carousel-slide-to="1"></button>
                            <button type="button" class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-500" data-carousel-slide-to="2"></button>
                        </div>
                        <button type="button" class="absolute top-1/2 left-4 transform -translate-y-1/2 p-2 bg-gray-100 bg-opacity-50 rounded-full hover:bg-gray-200" data-carousel-prev>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        </button>
                        <button type="button" class="absolute top-1/2 right-4 transform -translate-y-1/2 p-2 bg-gray-100 bg-opacity-50 rounded-full hover:bg-gray-200" data-carousel-next>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </button>
                    </div>
                </div>

            </div>
        </main>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.querySelector('[data-carousel]');
            const items = carousel.querySelectorAll('[data-carousel-item]');
            const buttons = carousel.querySelectorAll('[data-carousel-slide-to]');
            const prevButton = carousel.querySelector('[data-carousel-prev]');
            const nextButton = carousel.querySelector('[data-carousel-next]');

            let currentIndex = 0;

            function showSlide(index) {
                items.forEach((item, i) => {
                    if (i === index) {
                        item.classList.remove('opacity-0');
                        item.classList.add('opacity-100');
                    } else {
                        item.classList.add('opacity-0');
                        item.classList.remove('opacity-100');
                    }
                });
                buttons.forEach((button, i) => {
                    if (i === index) {
                        button.classList.add('bg-gray-500');
                        button.classList.remove('bg-gray-300');
                    } else {
                        button.classList.add('bg-gray-300');
                        button.classList.remove('bg-gray-500');
                    }
                });
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % items.length;
                showSlide(currentIndex);
            }

            function prevSlide() {
                currentIndex = (currentIndex - 1 + items.length) % items.length;
                showSlide(currentIndex);
            }

            buttons.forEach((button, index) => {
                button.addEventListener('click', () => {
                    currentIndex = index;
                    showSlide(currentIndex);
                });
            });

            nextButton.addEventListener('click', nextSlide);
            prevButton.addEventListener('click', prevSlide);

            showSlide(currentIndex); // Initialize the first slide
        });
    </script>

</body>
</html>