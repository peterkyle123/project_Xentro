<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subdivision->sub_name }} - Details</title>
    @vite('resources/css/app.css')
</head>
<body class="p-4">
    <h1 class="text-3xl font-bold mb-4">{{ $subdivision->sub_name }}</h1>

    <img src="{{ asset('storage/' . $subdivision->image) }}" alt="{{ $subdivision->sub_name }} Image" class="w-full h-64 object-cover rounded-lg mb-4">

    <div>
        <h2 class="text-xl font-semibold mb-2">Blocks & Houses</h2>
        @if ($blocks->isNotEmpty())
            @foreach ($blocks as $block)
                <div class="mb-4 p-3 border rounded">
                    <h3 class="text-lg font-bold">
                        Block {{ $block->block_id }} ({{ $block->block_area }} sq meters)
                    </h3>
                    @if ($block->houses->isNotEmpty())
                        <ul class="mt-2">
                            @foreach ($block->houses as $house)
                                <li class="mb-2">
                                    <span class="font-medium">House {{ $house->house_number }}:</span>
                                    {{ $house->house_status }} -
                                    <span class="text-green-600 font-bold">
                                        PHP {{ number_format($house->house_price, 2) }}
                                    </span>
                                    <br>
                                    <span class="font-medium">House Area:</span> {{ $house->house_area }} sq meters
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">No houses available in this block.</p>
                    @endif
                </div>
            @endforeach
        @else
            <p class="text-gray-500">No blocks available in this subdivision.</p>
        @endif
    </div>

    <a href="{{ route('subdivisions.index') }}" class="mt-6 inline-block bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded">
        Back to Subdivisions
    </a>
</body>
</html>
