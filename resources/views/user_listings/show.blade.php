<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $listing->title }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">{{ $listing->title }}</h1>

        @if ($listing->image)
            <img src="{{ asset('storage/' . $listing->image) }}" alt="{{ $listing->title }}" class="w-full h-64 object-cover rounded-2xl mb-4">
        @endif

        <p class="mb-2"><strong>Price:</strong> ₱{{ number_format($listing->price) }}</p>
        <p class="mb-2"><strong>Address:</strong> {{ $listing->address }}, {{ $listing->city }}, {{ $listing->state }} {{ $listing->zip }}</p>
        @if ($listing->category !== 'Land') 
            <p class="mb-2"><strong>Bedrooms:</strong> {{ $listing->bedrooms }}</p>
            <p class="mb-2"><strong>Bathrooms:</strong> {{ $listing->bathrooms }}</p>
        @endif
        <p class="mb-2"><strong>Area:</strong> {{ $listing->area }} sqft</p>
        <p class="mb-2"><strong>Category:</strong> {{ $listing->category }}</p>
        <p class="mb-2"><strong>Housing Type:</strong> {{ $listing->housing_type }}</p>
        @if ($listing->custom_housing_type)
            <p class="mb-2"><strong>Custom Housing Type:</strong> {{ $listing->custom_housing_type }}</p>
        @endif
        <p class="mb-4"><strong class="font-medium text-lg text-gray-800">Type:</strong>
                @if ($listing->type === 'sale')
                    Sale
                @elseif ($listing->type === 'lease')
                    Lease
                @elseif ($listing->type === 'rent')
                    Rent
                @else
                    {{ $listing->type }}
                @endif
            </p>
        <p class="mb-2"><strong>Status:</strong>  
                @if ($listing->status === 'pending')
                    Pending
                @elseif ($listing->status === 'active')
                    Active
                @elseif ($listing->status === 'sold')
                   Sold
                @elseif ($listing->status === 'leased')
                   Leased
                @else
                    {{ $listing->status }}
                @endif
            </p>
        <p class="mb-2"><strong>Description:</strong> {{ $listing->description }}</p>
        
     {{-- Map (if location data) --}}
      <div class="mb-10">
          <p class="mb-4 text-lg">
              <strong class="font-medium text-gray-800">Latitude:</strong> <span id="display-latitude">{{ $listing->latitude }}</span>
          </p>
          <p class="mb-4 text-lg">
              <strong class="font-medium text-gray-800">Longitude:</strong> <span id="display-longitude">{{ $listing->longitude }}</span>
          </p>
      </div>
      <div class="mb-4">
          <a href="#" id="google-maps-link" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">View on Google Maps</a>
      </div>


        <a href="{{ route('user_listings.index') }}" class="mt-4 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">Back to Listings</a>

        <a href="{{ route('inquiries.create', $listing->id) }}" class="mt-4 bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded">Inquire About This Property</a>
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