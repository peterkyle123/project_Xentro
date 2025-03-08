<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subdivisions</title>
    @vite('resources/css/app.css')
</head>
<body class="p-4">
    <h1 class="text-2xl font-bold mb-4">Subdivisions</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($subdivisions as $subdivision)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('storage/' . $subdivision->image) }}" alt="Subdivision Image" class="w-full h-48 object-cover">

                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $subdivision->sub_name }}</h2>
                    <p class="text-gray-600">
                        <span class="font-medium">Blocks:</span> {{ $subdivision->block_number }}
                    </p>
                    <p class="text-gray-600">
                        <span class="font-medium">Houses:</span> {{ $subdivision->house_number }}
                    </p>
                    <a href="{{ route('subdivisions.details', $subdivision) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">
                        View Details
                    </a>
                    <a href="{{ route('edit_subdivision', $subdivision->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">
                        Edit
                    </a>
                    <form action="{{ route('delete_subdivision', $subdivision->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this subdivision? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
