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
    
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 border">Subdivision Name</th>
                <th class="py-2 px-4 border">Image</th>
                <th class="py-2 px-4 border">Number of Blocks</th>
                <th class="py-2 px-4 border">Number of Houses</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subdivisions as $subdivision)
                <tr class="border">
                    <td class="py-2 px-4">{{ $subdivision->sub_name }}</td>
                    <td class="py-2 px-4">
                        <img src="{{ asset('storage/' . $subdivision->image) }}" alt="Subdivision Image" class="w-16 h-16 rounded">
                    </td>
                    <td class="py-2 px-4">{{ $subdivision->block_number }}</td>
                    <td class="py-2 px-4">{{ $subdivision->house_number }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
