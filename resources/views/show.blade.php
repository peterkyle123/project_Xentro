<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listing Details - {{ $listing->title }}</title>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  <style>
    .overlay {
      background: rgba(0, 0, 0, 0.3); /* Lower opacity for clearer background */
      backdrop-filter: blur(5px);
      padding: 40px;
      color: white;
      text-align: left; /* Align text to the left */
      max-width: 600px;
      margin-left: 50px; /* Adjusted position to the left */
      border-radius: 10px;
    }
  </style>
</head>
<body class="bg-gray-100">
  <div class="relative min-h-screen bg-cover bg-center flex items-center" style="background-image: url('{{ asset('storage/' . $listing->image) }}');">
    <!-- <div class="absolute inset-0 bg-black bg-opacity-50"></div> Reduced opacity for clearer image -->
    <div class="overlay relative z-10">
      <h1 class="text-4xl font-bold mb-4">{{ $listing->title }}</h1>
      <p class="text-lg mb-4">{{ $listing->description }}</p>
      <p class="text-lg"><strong>Price:</strong> ₱{{ number_format($listing->price) }}</p>
      <p class="text-lg"><strong>Type:</strong> 
        @if ($listing->type === 'sale') Sale 
        @elseif ($listing->type === 'lease') Lease 
        @elseif ($listing->type === 'rent') Rent 
        @else {{ $listing->type }} 
        @endif
      </p>
      <p class="text-lg"><strong>Address:</strong> {{ $listing->address }}, {{ $listing->city }}, {{ $listing->state }}, {{ $listing->zip }}</p>
      <p class="text-lg"><strong>Area:</strong> {{ $listing->area }} sqft</p>
      <p class="text-lg"><strong>Status:</strong> {{ $listing->status }}</p>
  <div class="mb-4">
    <a href="#" id="google-maps-link" target="_blank">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600 hover:text-blue-700" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
          </svg>
      </a>
</div>
      <div class="mt-6">
        <a href="{{ route('admin.listings.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-3 px-6 rounded-full font-semibold shadow-md">Back to Listings</a>
      </div>
    </div>
  </div>
  <script>
     // maps
     document.addEventListener('DOMContentLoaded', function() {
        const latitude = document.getElementById('display-latitude').textContent;
        const longitude = document.getElementById('display-longitude').textContent;
        const googleMapsLink = document.getElementById('google-maps-link');

        if (latitude && longitude) {
            googleMapsLink.href = `https://www.google.com/maps/search/?api=1&query=${latitude},${longitude}`;
        } else {
            googleMapsLink.href = '#'; // Or a default URL
        }
    });
  </script>

</body>
</html>
