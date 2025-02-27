<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
<div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Edit Listing</h1>
    

        <form action="{{ route('admin.listings.update', $listing->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Oops!</strong>
                    <span class="block sm:inline">There were some problems with your input.</span>
                    <ul class="list-disc list-inside mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input type="text" name="title" id="title" class="w-full border rounded py-2 px-3" value="{{ old('title', $listing->title) }}">
        </div>
        <div class="mb-4">
            <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
            <select name="category" id="category" class="w-full border rounded py-2 px-3">
                <option value="">Select Category</option>
                <option value="Land" {{ old('category', $listing->category) === 'Land' ? 'selected' : '' }}>Land</option>
                <option value="Housing" {{ old('category', $listing->category) === 'Housing' ? 'selected' : '' }}>Housing</option>
            </select>
        </div>
            
          
        <div class="mb-4 {{ old('category', $listing->category) === 'Housing' ? '' : 'hidden' }}" id="housing-type-wrapper">
            <label for="housing_type" class="block text-gray-700 text-sm font-bold mb-2">Housing Type</label>
            <select name="housing_type" id="housing_type" class="w-full border rounded py-2 px-3">
                <option value="">Select Housing Type</option>
                <option value="Office Property" {{ old('housing_type', $listing->housing_type) === 'Office Property' ? 'selected' : '' }}>Office Property</option>
                <option value="Residential" {{ old('housing_type', $listing->housing_type) === 'Residential' ? 'selected' : '' }}>Residential</option>
                <option value="Other" {{ old('housing_type', $listing->housing_type) === 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="mb-4 {{ old('housing_type', $listing->housing_type) === 'Other' ? '' : 'hidden' }}" id="custom-housing-type-wrapper">
            <label for="custom_housing_type" class="block text-gray-700 text-sm font-bold mb-2">Specify Housing Type</label>
            <input type="text" name="custom_housing_type" id="custom_housing_type" class="w-full border rounded py-2 px-3" value="{{ old('custom_housing_type', $listing->custom_housing_type) }}">
        </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea name="description" id="description" class="w-full border rounded py-2 px-3">{{ old('description', $listing->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type</label>
                <select name="type" id="type" class="w-full border rounded py-2 px-3">
                    <option value="sale" {{ old('type', $listing->type) == 'sale' ? 'selected' : '' }}>Sale</option>
                    <option value="lease" {{ old('type', $listing->type) == 'lease' ? 'selected' : '' }}>Lease</option>
                    <option value="rent" {{ old('type', $listing->type) == 'rent' ? 'selected' : '' }}>Rent</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                <input type="number" name="price" id="price" class="w-full border rounded py-2 px-3" value="{{ old('price', $listing->price) }}" min="0" step="0.01">
            </div>

            <div class="mb-4">
                <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address</label>
                <input type="text" name="address" id="address" class="w-full border rounded py-2 px-3" value="{{ old('address', $listing->address) }}">
            </div>

            <div class="mb-4">
                <label for="city" class="block text-gray-700 text-sm font-bold mb-2">City</label>
                <input type="text" name="city" id="city" class="w-full border rounded py-2 px-3" value="{{ old('city', $listing->city) }}">
            </div>

            <div class="mb-4">
                <label for="state" class="block text-gray-700 text-sm font-bold mb-2">State</label>
                <input type="text" name="state" id="state" class="w-full border rounded py-2 px-3" value="{{ old('state', $listing->state) }}">
            </div>

            <div class="mb-4">
                <label for="zip" class="block text-gray-700 text-sm font-bold mb-2">Zip</label>
                <input type="text" name="zip" id="zip" class="w-full border rounded py-2 px-3" value="{{ old('zip', $listing->zip) }}">
            </div>

            <div class="mb-4">
                <label for="bedrooms" class="block text-gray-700 text-sm font-bold mb-2">Bedrooms</label>
                <input type="number" name="bedrooms" id="bedrooms" class="w-full border rounded py-2 px-3" value="{{ old('bedrooms', $listing->bedrooms) }}" min="0" step="1">
            </div>

            <div class="mb-4">
                <label for="bathrooms" class="block text-gray-700 text-sm font-bold mb-2">Bathrooms</label>
                <input type="number" name="bathrooms" id="bathrooms" class="w-full border rounded py-2 px-3" value="{{ old('bathrooms', $listing->bathrooms) }}" min="0" step="1">
            </div>

            <div class="mb-4">
                <label for="area" class="block text-gray-700 text-sm font-bold mb-2">Area</label>
                <input type="number" name="area" id="area" class="w-full border rounded py-2 px-3" value="{{ old('area', $listing->area) }}" min="0">
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                <select name="status" id="status" class="w-full border rounded py-2 px-3">
                    <option value="pending" {{ old('status', $listing->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="active" {{ old('status', $listing->status) == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="sold" {{ old('status', $listing->status) == 'sold' ? 'selected' : '' }}>Sold</option>
                    <option value="leased" {{ old('status', $listing->status) == 'leased' ? 'selected' : '' }}>Leased</option>
                </select>
            </div>

            <div class="mb-4">
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                    <input type="file" name="image" id="image" class="w-full border rounded py-2 px-3">
                    @if ($listing->image)
                        <img src="{{ asset('storage/' . $listing->image) }}" alt="Current Image" class="mt-2" style="max-width: 200px;">
                    @endif
            </div>
            <div class="mb-4">
                <label for="latitude" class="block text-gray-700 text-sm font-bold mb-2">Latitude</label>
                <input type="text" name="latitude" id="latitude" class="w-full border rounded py-2 px-3" value="{{ $listing->latitude }}">
            </div>

            <div class="mb-4">
                <label for="longitude" class="block text-gray-700 text-sm font-bold mb-2">Longitude</label>
                <input type="text" name="longitude" id="longitude" class="w-full border rounded py-2 px-3" value="{{ $listing->longitude }}">
            </div>

            <div class="mb-4">
                <a href="#" id="google-maps-link" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">View on Google Maps</a>
            </div>


            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">Update Listing</button>
<script>
    //  maps
    document.getElementById('latitude').addEventListener('input', updateGoogleMapsLink);
    document.getElementById('longitude').addEventListener('input', updateGoogleMapsLink);

function updateGoogleMapsLink() {
    const latitude = document.getElementById('latitude').value;
    const longitude = document.getElementById('longitude').value;
    const googleMapsLink = document.getElementById('google-maps-link');

    if (latitude && longitude) {
        googleMapsLink.href = `https://www.google.com/maps/place/${latitude},${longitude}`;
    } else {
        googleMapsLink.href = '#'; // Or a default URL
    }
}
   document.addEventListener("DOMContentLoaded", function () {
        const categorySelect = document.getElementById("category");
        const housingTypeWrapper = document.getElementById("housing-type-wrapper");
        const housingTypeSelect = document.getElementById("housing_type");
        const customHousingTypeWrapper = document.getElementById("custom-housing-type-wrapper");
        const customHousingTypeInput = document.getElementById("custom_housing_type");

        // Hide elements by default
        housingTypeWrapper.classList.add("hidden");
        customHousingTypeWrapper.classList.add("hidden");

        categorySelect.addEventListener("change", function () {
            if (this.value === "Housing") {
                housingTypeWrapper.classList.remove("hidden"); // Show housing type dropdown
            } else {
                housingTypeWrapper.classList.add("hidden"); // Hide housing type dropdown
                customHousingTypeWrapper.classList.add("hidden"); // Hide custom input
                housingTypeSelect.value = ""; // Reset value
                customHousingTypeInput.value = ""; // Reset value
            }
        });

        housingTypeSelect.addEventListener("change", function () {
            if (this.value === "Other") {
                customHousingTypeWrapper.classList.remove("hidden"); // Show input field for "Other"
            } else {
                customHousingTypeWrapper.classList.add("hidden"); // Hide it if another option is selected
                customHousingTypeInput.value = ""; // Reset value
            }
        });
    });
</script>
</body>
</html>