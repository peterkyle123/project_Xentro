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
    <div class="container mx-auto p-8 max-w-5xl">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-gray-800">Xentro Company</h1>
            <p class="mt-2 text-lg text-gray-600">A real estate development company in the Visayas. That aims to establish itself as a trusted developer, strive to shape the future of real estate development, and become a trusted partner for those seeking quality properties in the region.</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-lg mb-8">
            <h2 class="text-2xl font-semibold text-gray-700">Our Mission</h2>
            <p class="text-gray-600 mt-2">
                Committed to creating sustainable communities that enhance the quality of life for residents while contributing positively to the country's development.
            </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-lg mb-8">
            <h2 class="text-2xl font-semibold text-gray-700">Our Vision</h2>
            <p class="text-gray-600 mt-2">
                To be a leading developer that creates communities known for innovative design, quality projects, and excellent service.
            </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-lg mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 border-b-2 border-gray-200 pb-2">Core Values</h2>
            <ul class="text-gray-600 mt-4 space-y-2">
                <li class="flex items-center">
                    <span class="text-blue-500 font-bold text-lg mr-2">✓</span> Integrity
                </li>
                <li class="flex items-center">
                    <span class="text-blue-500 font-bold text-lg mr-2">✓</span> Quality
                </li>
                <li class="flex items-center">
                    <span class="text-blue-500 font-bold text-lg mr-2">✓</span> Service
                </li>
            </ul>
        </div>
           <!-- CEO Section (Hardcoded) -->
           <div class="bg-white p-6 rounded-xl shadow-lg mb-8 text-center">
            <h2 class="text-2xl font-semibold text-gray-700">Our CEO</h2>
            <div class="mt-4">
                <img src="{{ asset('images/ceo.jpg') }}" alt="CEO Image" class="w-40 h-40 mx-auto rounded-full object-cover shadow-lg">
                <h3 class="font-semibold text-xl text-gray-800 mt-4">Efren "Renz" Adlaon </h3>
                <p class="text-sm text-gray-600">President & Chief Executive Officer</p>
                <p class="italic text-gray-700 mt-2">"Leading with innovation and commitment to excellence."</p>
            </div>
        </div>

        <!-- Our Team Section -->
        <div class="bg-white p-6 rounded-xl shadow-lg mb-8"> 
            <h2 class="text-2xl font-semibold text-gray-700">Our Team</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                @foreach($teamMembers as $member)
                    <div class="bg-gray-50 p-4 rounded-lg shadow-md text-center">
                        <a href="{{ route('team.show', $member->id) }}" class="block">
                            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="w-32 h-32 mx-auto rounded-full object-cover mb-3 transition-transform transform hover:scale-105">
                        </a>
                        <h3 class="font-semibold text-lg text-gray-800">{{ $member->name }}</h3>
                        <p class="text-sm text-gray-600">{{ $member->position }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Gallery Section (Hardcoded) -->
        <div class="bg-white p-6 rounded-xl shadow-lg mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 text-center">Gallery</h2>
    <div class="relative overflow-hidden mt-4">
        <div id="gallery" class="flex space-x-4 overflow-x-auto scrollbar-hide p-2 cursor-grab">
            <img src="{{ asset('images/28.png') }}" alt="Gallery Image 1" class="w-64 h-40 rounded-lg shadow-md hover:scale-105 transition">
            <img src="{{ asset('images/28.png') }}" alt="Gallery Image 2" class="w-64 h-40 rounded-lg shadow-md hover:scale-105 transition">
            <img src="{{ asset('images/28.png') }}" alt="Gallery Image 3" class="w-64 h-40 rounded-lg shadow-md hover:scale-105 transition">
            <img src="{{ asset('images/28.png') }}" alt="Gallery Image 4" class="w-64 h-40 rounded-lg shadow-md hover:scale-105 transition">
            <img src="{{ asset('images/28.png') }}" alt="Gallery Image 5" class="w-64 h-40 rounded-lg shadow-md hover:scale-105 transition">
            <img src="{{ asset('images/28.png') }}" alt="Gallery Image 6" class="w-64 h-40 rounded-lg shadow-md hover:scale-105 transition">
        </div>
    </div>
</div>
    <script>
    const slider = document.getElementById('gallery');
    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener('mousedown', (e) => {
        isDown = true;
        slider.classList.add('active');
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });

    slider.addEventListener('mouseleave', () => {
        isDown = false;
        slider.classList.remove('active');
    });

    slider.addEventListener('mouseup', () => {
        isDown = false;
        slider.classList.remove('active');
    });

    slider.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 2; // Adjust scroll speed
        slider.scrollLeft = scrollLeft - walk;
    });

    // Hide scrollbar (Tailwind utility)
    document.styleSheets[0].insertRule('.scrollbar-hide::-webkit-scrollbar { display: none; }', 0);
    document.styleSheets[0].insertRule('.scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }', 0);
</script>
</body>
</html>
