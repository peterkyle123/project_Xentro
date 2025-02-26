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
        <h1 class="text-2xl font-semibold mb-4">Create New Listing</h1>

        <form action="{{ route('admin.listings.store') }}" method="POST">
            @csrf
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
                <input type="text" name="title" id="title" class="w-full border rounded py-2 px-3">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea name="description" id="description" class="w-full border rounded py-2 px-3"></textarea>
            </div>

            <div class="mb-4">
                <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type</label>
                <select name="type" id="type" class="w-full border rounded py-2 px-3">
                    <option value="sale">Sale</option>
                    <option value="lease">Lease</option>
                    <option value="rent">Rent</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                <input type="number" name="price" id="price" class="w-full border rounded py-2 px-3">
            </div>

            <div class="mb-4">
                <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address</label>
                <input type="text" name="address" id="address" class="w-full border rounded py-2 px-3">
            </div>

            <div class="mb-4">
                <label for="city" class="block text-gray-700 text-sm font-bold mb-2">City</label>
                <input type="text" name="city" id="city" class="w-full border rounded py-2 px-3">
            </div>

            <div class="mb-4">
                <label for="state" class="block text-gray-700 text-sm font-bold mb-2">State</label>
                <input type="text" name="state" id="state" class="w-full border rounded py-2 px-3">
            </div>

            <div class="mb-4">
                <label for="zip" class="block text-gray-700 text-sm font-bold mb-2">Zip</label>
                <input type="text" name="zip" id="zip" class="w-full border rounded py-2 px-3">
            </div>

            <div class="mb-4">
                <label for="bedrooms" class="block text-gray-700 text-sm font-bold mb-2">Bedrooms</label>
                <input type="number" name="bedrooms" id="bedrooms" class="w-full border rounded py-2 px-3">
            </div>

            <div class="mb-4">
                <label for="bathrooms" class="block text-gray-700 text-sm font-bold mb-2">Bathrooms</label>
                <input type="number" name="bathrooms" id="bathrooms" class="w-full border rounded py-2 px-3" step="0.5">
            </div>

            <div class="mb-4">
                <label for="area" class="block text-gray-700 text-sm font-bold mb-2">Area</label>
                <input type="number" name="area" id="area" class="w-full border rounded py-2 px-3">
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                <select name="status" id="status" class="w-full border rounded py-2 px-3">
                    <option value="pending">Pending</option>
                    <option value="active">Active</option>
                    <option value="sold">Sold</option>
                    <option value="leased">Leased</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                <input type="file" name="image" id="image" class="w-full border rounded py-2 px-3" accept="image/*">
            </div>


            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">Create Listing</button>
        </form>
    </div>

    <script>
       // Prevent negative numbers and non-whole numbers for bedrooms
       document.getElementById('bedrooms').addEventListener('input', function(e) {
            if (this.value < 0) {
                this.value = 0;
            }
            if (!Number.isInteger(Number(this.value))) {
                this.value = Math.round(this.value);
            }
        });

        // Prevent negative numbers for bathrooms and area
        document.getElementById('bathrooms').addEventListener('input', function(e) {
            if (this.value < 0) {
                this.value = 0;
            }
        });

        document.getElementById('area').addEventListener('input', function(e) {
            if (this.value < 0) {
                this.value = 0;
            }
        });
        document.getElementById('price').addEventListener('input', function(e) {
            if (this.value < 0) {
                this.value = 0;
            }
        });
    </script>
</body>
</html>