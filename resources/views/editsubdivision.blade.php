<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Subdivision</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Edit Subdivision</h1>
        <form action="{{ route('update_subdivision', $subdivision->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="bg-red-100 text-red-600 p-3 mb-4 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="bg-green-100 text-green-600 p-3 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <label class="text-gray-700 font-bold mb-2">Subdivision Name</label>
                <input type="text" name="sub_name" class="w-full border rounded py-2 px-3" value="{{ $subdivision->sub_name }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Subdivision Image</label>
                <input type="file" name="sub_image" class="w-full border rounded py-2 px-3" accept="image/*">
                @if ($subdivision->image)
                    <img src="{{ asset('storage/' . $subdivision->image) }}" alt="Current Subdivision Image" class="mt-2 max-w-xs">
                @endif
            </div>

            <div id="blocks-container" class="mb-4">
                <h2 class="text-xl font-semibold">Blocks</h2>

                @foreach ($subdivision->blocks as $block)
                    <div class="block p-4 border mb-4">
                        <h3 class="text-lg font-bold">Block {{ $block->block_number }}</h3>
                        <input type="hidden" name="blocks[{{ $block->id }}][block_number]" value="{{ $block->block_number }}">

                        <label class="block text-gray-700 font-bold mt-2">Block Area (sq meters)</label>
                        <input type="number" name="blocks[{{ $block->id }}][block_area]" class="w-full border rounded py-2 px-3 mb-2" value="{{ $block->block_area }}" step="any" required>

                        <div class="houses-container mb-2">
                            @foreach ($block->houses as $house)
                                <div class="mb-2">
                                    <label>Lot Number</label>
                                    <input type="text" name="blocks[{{ $block->id }}][houses][{{ $house->id }}][assigned_house_number]" class="border rounded px-2 py-1" value="{{ $house->assigned_house_number }}" required>

                                    <input type="hidden" name="blocks[{{ $block->id }}][houses][{{ $house->id }}][block_id]" value="{{ $block->id }}">

                                    <label class="block text-gray-700 font-bold mt-2">Lot Area (sq meters)</label>
                                    <input type="number" name="blocks[{{ $block->id }}][houses][{{ $house->id }}][house_area]" class="w-full border rounded py-2 px-3" value="{{ $house->house_area }}" step="any" required>

                                    <label class="block text-gray-700 font-bold mt-2">Lot Price (PHP)</label>
                                    <input type="number" name="blocks[{{ $block->id }}][houses][{{ $house->id }}][house_price]" class="w-full border rounded py-2 px-3" min="0" value="{{ $house->house_price }}" step="any" required>

                                    <label class="block text-gray-700 font-bold mt-2">Lot Status</label>
                                    <select name="blocks[{{ $block->id }}][houses][{{ $house->id }}][house_status]" class="w-full border rounded py-2 px-3" required>
                                        <option value="Available" {{ $house->house_status == 'Available' ? 'selected' : '' }}>Available</option>
                                        <option value="Reserved" {{ $house->house_status == 'Reserved' ? 'selected' : '' }}>Reserved</option>
                                    </select>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="add-house bg-gray-500 text-white px-3 py-1 rounded mt-2">Add Lot</button>
                    </div>
                @endforeach
                <button type="button" id="add-block" class="bg-blue-500 text-white px-4 py-2 rounded">Add Block</button>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded mt-4">Update</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let blockCount = {{ $subdivision->blocks->max('block_number') ?? 0 }};

            document.getElementById('add-block').addEventListener('click', function() {
                const blockContainer = document.getElementById('blocks-container');

                blockCount++;
                console.log("New block index:", blockCount);

                const blockDiv = document.createElement('div');
                blockDiv.classList.add('block', 'p-4', 'border', 'mb-4');
                blockDiv.innerHTML = `
                    <h3 class="text-lg font-bold">Block <span class="math-inline">\{blockCount\}</h3\>
                    <input type\="hidden" name\="blocks\[new\_</span>{blockCount}][block_number]" value="<span class="math-inline">\{blockCount\}"\>
                    <label class\="block text\-gray\-700 font\-bold mt\-2"\>Block Area \(sq meters\)</label\>
                    <input type\="number" name\="blocks\[new\_</span>{blockCount}][block_area]" class="w-full border rounded py-2 px-3 mb-2" step="any" required>

                    <div class="houses-container mb-2"></div>
                    <button type="button" class="add-house bg-gray-500 text-white px-3 py-1 rounded mt-2">Add Lot</button>
                `;
                blockContainer.appendChild(blockDiv);

                blockDiv.querySelector('.add-house').addEventListener('click', function() {
                    const houseContainer = blockDiv.querySelector('.houses-container');
                    const houseIndex = houseContainer.children.length + 1;

                    const houseDiv = document.createElement('div');
                    houseDiv.classList.add('mb-2');
                    houseDiv.innerHTML = `
                        <label>Lot Number</label>
                        <input type="text" name="blocks[new_${blockCount}][houses][new_${houseIndex}][assigned_house_number]" class="border rounded px-2 py-1" required>

                        <input type="hidden" name="blocks[new_${blockCount}][houses][new_${houseIndex}][block_id]" value="<span class="math-inline">\{blockCount\}"\>
                        <label class\="block text\-gray\-700 font\-bold mt\-2"\>Lot Area \(sq meters\)</label\>
                        <input type\="number" name\="blocks\[new\_</span>{blockCount}][houses][new_${houseIndex}][house_area]" class="w-full border rounded py-2 px-3" step="any" min="0" required>

                        <label class="block text-gray-700 font-bold mt-2">Lot Price (PHP)</label>
                        <input type="number" name="blocks[new_${blockCount}][houses][new_${houseIndex}][house_price]" class="w-full border rounded py-2 px-3"  step="any" min="0" required>

                        <label class="block text-gray-700 font-bold mt-2">Lot Status</label>
                        <select name="blocks[new_${blockCount}][houses][new_${houseIndex}][house_status]" class="w-full border rounded py-2 px-3" required>
                            <option value="Available">Available</option>
                            <option value="Reserved">Reserved</option>
                        </select>
                    `;
                    houseContainer.appendChild
                });
      });
    });

    // Prevent negative values for house price (as an extra safeguard)
    document.addEventListener('input', function(event) {
      if (event.target.classList.contains('house-price')) {
        if (event.target.value < 0) {
          event.target.value = 0;
        }
      }
    });
  </script>
</body>
</html>
