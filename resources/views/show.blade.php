<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listing Details - {{ $listing->title }}</title>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
</head>
<body class="bg-gray-100">
  <div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold mb-8 text-center md:text-left">Listing Details</h1>

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden p-8">

      @if ($listing->image)
        <!-- Use max-h-96 and object-contain to preserve aspect ratio -->
        <img src="{{ asset('storage/' . $listing->image) }}" alt="{{ $listing->title }}" class="w-full max-h-96 object-contain rounded-t-2xl mb-8">
      @endif

      <h2 class="text-3xl font-semibold mb-6 text-center md:text-left">{{ $listing->title }}</h2>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
        <div>
          <p class="mb-4"><strong class="font-medium text-lg text-gray-800">Description:</strong> {{ $listing->description }}</p>
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
          <p class="mb-4"><strong class="font-medium text-lg text-gray-800">Price:</strong> ₱{{ number_format($listing->price) }}</p>
          <p class="mb-4"><strong class="font-medium text-lg text-gray-800">Address:</strong> {{ $listing->address }}</p>
          <p class="mb-4"><strong class="font-medium text-lg text-gray-800">City:</strong> {{ $listing->city }}</p>
          <p class="mb-4"><strong class="font-medium text-lg text-gray-800">State:</strong> {{ $listing->state }}</p>
          <p class="mb-4"><strong class="font-medium text-lg text-gray-800">Zip:</strong> {{ $listing->zip }}</p>
        </div>
        <div>
          <div class="flex items-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 19v-7" />
            </svg>
            <p class="text-lg"><strong class="font-medium text-gray-800">Bedrooms:</strong> {{ $listing->bedrooms }}</p>
          </div>
          <div class="flex items-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
            </svg>
            <p class="text-lg"><strong class="font-medium text-gray-800">Bathrooms:</strong> {{ $listing->bathrooms }}</p>
          </div>
          <div class="flex items-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
            </svg>
            <p class="text-lg"><strong class="font-medium text-gray-800">Area:</strong> {{ $listing->area }} sqft</p>
          </div>
          <p class="mb-4 text-lg"><strong class="font-medium text-gray-800">Status:</strong> {{ $listing->status }}</p>
          <p class="mb-4 text-lg"><strong class="font-medium text-gray-800">Created At:</strong> {{ $listing->created_at }}</p>
          <p class="mb-4 text-lg"><strong class="font-medium text-gray-800">Updated At:</strong> {{ $listing->updated_at }}</p>
        </div>
      </div>
       {{-- Map (if location data) --}}
       <div class="mb-10">
                {{-- Implement map here (e.g., Google Maps) --}}
                <div class="h-80 bg-gray-200 rounded-lg">
                    Map Placeholder
                </div>
            </div>

            {{-- Contact/Inquiry Form --}}
            <div class="mb-10">
                {{-- Implement contact form here --}}
                <div class="bg-gray-100 p-6 rounded-lg">
                    Contact Form Placeholder
                </div>
            </div>

            {{-- Social Sharing Buttons --}}
            <div class="mb-10">
                {{-- Implement social sharing buttons here --}}
                Social Sharing Buttons Placeholder
            </div>

      <div class="text-center md:text-left">
        <a href="{{ route('admin.listings.index') }}" class="inline-flex items-center bg-gray-300 hover:bg-gray-400 text-gray-800 py-3 px-6 rounded-full font-semibold transition-colors duration-300 shadow-md hover:shadow-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
          </svg>
          Back to Listings
        </a>
      </div>
    </div>
  </div>
</body>
</html>
