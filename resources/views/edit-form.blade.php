<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit House</title>
    @vite('resources/css/app.css')
</head>
<body class="p-4">
    <h1 class="text-2xl font-bold mb-4">Edit House</h1>

    <form action="{{ route('admin.houses.update', $house) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="house_area">
                House Area
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="house_area" type="text" name="house_area" value="{{ old('house_area', $house->house_area) }}">
            @error('house_area')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="house_price">
                House Price
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="house_price" type="text" name="house_price" value="{{ old('house_price', $house->house_price) }}">
            @error('house_price')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="house_status">
                House Status
            </label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="house_status" name="house_status">
                <option value="Available" {{ old('house_status', $house->house_status) === 'Available' ? 'selected' : '' }}>Available</option>
                <option value="Sold" {{ old('house_status', $house->house_status) === 'Sold' ? 'selected' : '' }}>Sold</option>
                <option value="Reserved" {{ old('house_status', $house->house_status) === 'Reserved' ? 'selected' : '' }}>Reserved</option>
            </select>
            @error('house_status')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus-shadow-outline" type="submit">
                Update House
            </button>
        </div>
    </form>

    <a href="{{ route('admin.houses.edit', ['subdivision' => $house->subdivision_id, 'block' => $house->block_number]) }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
        Back to Houses
    </a>
</body>
</html>