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
    <!-- Main Update Form -->
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

    <!-- Blocks Section -->
    <div id="blocks-container" class="mb-4">
      <h2 class="text-xl font-semibold">Blocks</h2>
      <!-- Existing Blocks -->
      @foreach ($subdivision->blocks as $block)
      <div class="block p-4 border mb-4" data-block-id="{{ $block->id }}">
        <div class="flex justify-between items-center">
          <h3 class="text-lg font-bold">Block {{ $loop->iteration }}</h3>
          <!-- Delete Block Button (calls JS function) -->
          <button type="button"
                  class="bg-red-500 text-white px-3 py-1 rounded"
                  onclick="deleteBlock({{ $block->id }})">
            Delete Block
          </button>
        </div>

        <input type="hidden" name="blocks[{{ $block->id }}][block_number]" value="{{ $loop->iteration }}">
        <label class="block text-gray-700 font-bold mt-2">Block Area (sq meters)</label>
        <input type="number" name="blocks[{{ $block->id }}][block_area]" class="w-full border rounded py-2 px-3 mb-2" value="{{ $block->block_area }}" step="any" required>

        <div class="houses-container mb-2">
          @foreach ($block->houses as $house)
            <div class="mb-2 border p-2 rounded">
              <div class="flex justify-between items-center">
                <label>Lot Number</label>
                <!-- Delete House Button (calls JS function) -->
                <button type="button"
                        class="bg-red-500 text-white px-2 py-1 rounded"
                        onclick="deleteHouse({{ $house->id }})">
                  Delete House
                </button>
              </div>
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
        <button type="button" class="add-house-existing bg-gray-500 text-white px-3 py-1 rounded mt-2">Add Lot</button>
      </div>
      @endforeach

      <!-- Button to add new block -->
      <button type="button" id="add-block" class="bg-blue-500 text-white px-4 py-2 rounded">Add Block</button>
    </div>

    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded mt-4">Update</button>
  </form>

  <!-- Hidden forms for deletion (placed outside the main update form) -->
  <form id="delete-block-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
  </form>

  <form id="delete-house-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
  </form>

  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize blockCount to the number of existing blocks
      let blockCount = {{ $subdivision->blocks->count() }};

      // Add event listener for adding houses in existing blocks
      document.querySelectorAll('.block[data-block-id]').forEach(blockDiv => {
        blockDiv.querySelector('.add-house-existing').addEventListener('click', function() {
          const houseContainer = blockDiv.querySelector('.houses-container');
          // Calculate new house index based on current houses
          const houseIndex = houseContainer.children.length + 1;
          // Get the existing block id from data attribute
          const blockId = blockDiv.getAttribute('data-block-id');

          const houseDiv = document.createElement('div');
          houseDiv.classList.add('mb-2');
          houseDiv.innerHTML = `
            <label>Lot Number</label>
            <input type="text" name="blocks[${blockId}][houses][new_${houseIndex}][assigned_house_number]" class="border rounded px-2 py-1" required>
            <input type="hidden" name="blocks[${blockId}][houses][new_${houseIndex}][block_id]" value="${blockId}">
            <label class="block text-gray-700 font-bold mt-2">Lot Area (sq meters)</label>
            <input type="number" name="blocks[${blockId}][houses][new_${houseIndex}][house_area]" class="w-full border rounded py-2 px-3" step="any" min="0" required>
            <label class="block text-gray-700 font-bold mt-2">Lot Price (PHP)</label>
            <input type="number" name="blocks[${blockId}][houses][new_${houseIndex}][house_price]" class="w-full border rounded py-2 px-3" step="any" min="0" required>
            <label class="block text-gray-700 font-bold mt-2">Lot Status</label>
            <select name="blocks[${blockId}][houses][new_${houseIndex}][house_status]" class="w-full border rounded py-2 px-3" required>
              <option value="Available">Available</option>
              <option value="Reserved">Reserved</option>
            </select>
          `;
          houseContainer.appendChild(houseDiv);
        });
      });

      // Add event listener for adding new blocks
      document.getElementById('add-block').addEventListener('click', function() {
        const blockContainer = document.getElementById('blocks-container');

        blockCount++; // Increment the counter for the new block
        console.log("New block index:", blockCount);

        const blockDiv = document.createElement('div');
        blockDiv.classList.add('block', 'p-4', 'border', 'mb-4');
        // For new blocks, we use a naming convention with "new_" prefix.
        blockDiv.innerHTML = `
          <h3 class="text-lg font-bold">Block ${blockCount}</h3>
          <input type="hidden" name="blocks[new_${blockCount}][block_number]" value="${blockCount}">
          <label class="block text-gray-700 font-bold mt-2">Block Area (sq meters)</label>
          <input type="number" name="blocks[new_${blockCount}][block_area]" class="w-full border rounded py-2 px-3 mb-2" step="any" required>
          <div class="houses-container mb-2"></div>
          <button type="button" class="add-house-new bg-gray-500 text-white px-3 py-1 rounded mt-2">Add Lot</button>
        `;
        // Insert the new block before the "Add Block" button
        blockContainer.insertBefore(blockDiv, document.getElementById('add-block'));

        // Attach event listener for the add house button in this new block
        blockDiv.querySelector('.add-house-new').addEventListener('click', function() {
          const houseContainer = blockDiv.querySelector('.houses-container');
          const houseIndex = houseContainer.children.length + 1;
          const houseDiv = document.createElement('div');
          houseDiv.classList.add('mb-2');
          houseDiv.innerHTML = `
            <label>Lot Number</label>
            <input type="text" name="blocks[new_${blockCount}][houses][new_${houseIndex}][assigned_house_number]" class="border rounded px-2 py-1" required>
            <input type="hidden" name="blocks[new_${blockCount}][houses][new_${houseIndex}][block_id]" value="${blockCount}">
            <label class="block text-gray-700 font-bold mt-2">Lot Area (sq meters)</label>
            <input type="number" name="blocks[new_${blockCount}][houses][new_${houseIndex}][house_area]" class="w-full border rounded py-2 px-3" step="any" min="0" required>
            <label class="block text-gray-700 font-bold mt-2">Lot Price (PHP)</label>
            <input type="number" name="blocks[new_${blockCount}][houses][new_${houseIndex}][house_price]" class="w-full border rounded py-2 px-3" step="any" min="0" required>
            <label class="block text-gray-700 font-bold mt-2">Lot Status</label>
            <select name="blocks[new_${blockCount}][houses][new_${houseIndex}][house_status]" class="w-full border rounded py-2 px-3" required>
              <option value="Available">Available</option>
              <option value="Reserved">Reserved</option>
            </select>
          `;
          houseContainer.appendChild(houseDiv);
        });
      });
    });

    // Extra safeguard to prevent negative values for house price
    document.addEventListener('input', function(event) {
      if (event.target.classList.contains('house-price') && event.target.value < 0) {
        event.target.value = 0;
      }
    });

    function deleteBlock(blockId) {
    if(confirm('Are you sure you want to delete this block? This will delete all its houses as well.')) {
      var form = document.getElementById('delete-block-form');
      form.action = "{{ url('') }}" + "/block/" + blockId;
      form.submit();
    }
  }

  // Function to handle house deletion using the hidden form
  function deleteHouse(houseId) {
    if(confirm('Are you sure you want to delete this house?')) {
      var form = document.getElementById('delete-house-form');
      form.action = "{{ url('') }}" + "/house/" + houseId;
      form.submit();
    }
  }
  </script>
</body>
</html>
