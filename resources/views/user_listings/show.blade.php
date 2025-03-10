<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $listing->title }}</title>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  <style>
    .overlay {
      background: rgba(0, 0, 0, 0.5);
      backdrop-filter: blur(8px);
      padding: 20px;
      color: white;
      text-align: left;
      max-width: 90%;
      margin: auto;
      border-radius: 12px;
    }
  </style>
</head>
<body class="bg-gray-100">
  <div class="relative min-h-screen bg-cover bg-center flex items-center px-4 py-8 md:px-0" style="background-image: url('{{ asset('storage/' . $listing->image) }}');">
    <div class="overlay relative z-10 p-4 md:p-8">
      <h1 class="text-2xl md:text-4xl font-bold mb-4">{{ $listing->title }}</h1>
      <p class="text-base md:text-lg mb-4">{{ $listing->description }}</p>
      <p class="text-base md:text-lg"><strong>Price:</strong> ₱{{ number_format($listing->price) }}</p>
      <p class="text-base md:text-lg"><strong>Type:</strong> {{ ucfirst($listing->type) }}</p>
      <p class="text-base md:text-lg"><strong>Address:</strong> {{ $listing->address }}, {{ $listing->city }}, {{ $listing->state }}, {{ $listing->zip }}</p>
      <p class="text-base md:text-lg"><strong>Area:</strong> {{ $listing->area }} sqft</p>
      <p class="text-base md:text-lg"><strong>Status:</strong> {{ ucfirst($listing->status) }}</p>

      <div class="mt-4">
        <a href="#" id="google-maps-link" target="_blank" class="inline-flex items-center space-x-2 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-full shadow-md text-sm md:text-base">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>

      <div class="mt-6 flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-4">
        <a href="{{ route('user_listings.index') }}" class="w-full md:w-auto bg-gray-300 hover:bg-gray-400 text-gray-800 py-3 px-6 rounded-full font-semibold shadow-md text-center">Back to Listings</a>
        <a href="{{ route('inquiries.create', $listing->id) }}" class="w-full md:w-auto bg-green-600 hover:bg-green-700 text-white py-3 px-6 rounded-full font-semibold shadow-md text-center">Inquire Now</a>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const latitude = {{ $listing->latitude }};
      const longitude = {{ $listing->longitude }};
      const googleMapsLink = document.getElementById('google-maps-link');

      if (latitude && longitude) {
        googleMapsLink.href = `https://www.google.com/maps/search/?api=1&query=${latitude},${longitude}`;
      } else {
        googleMapsLink.href = '#';
      }
    });
  </script>
</body>
</html>
