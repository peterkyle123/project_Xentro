<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Subdivision</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Create New Subdivision</h1>
        <form action="{{ route('subdivision.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label class=" text-gray-700 font-bold mb-2">Subdivision Name</label>
                <input type="text" name="sub_name" class="w-full border rounded py-2 px-3" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Subdivision Image</label>
                <input type="file" name="sub_image" class="w-full border rounded py-2 px-3" accept="image/*" required>
            </div>
            
            <div id="blocks-container" class="mb-4">
                <h2 class="text-xl font-semibold">Blocks</h2>
                <button type="button" id="add-block" class="bg-blue-500 text-white px-4 py-2 rounded">Add Block</button>
            </div>
            
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded mt-4">Submit</button>
        </form>
    </div>
    
    <script>
document.getElementById('add-block').addEventListener('click', function() {
    const blockContainer = document.getElementById('blocks-container');
    
    let blocks = blockContainer.children.length;
    console.log("Total existing blocks:", blocks); // Debugging line
    
    let blockIndex = blocks -1;
    console.log("New block index:", blockIndex); // Debugging line

        const blockDiv = document.createElement('div');
        blockDiv.classList.add('block', 'p-4', 'border', 'mb-4');
        blockDiv.innerHTML = `
            <h3 class="text-lg font-bold">Block ${blockIndex }</h3>
            <input type="hidden" name="blocks[${blockIndex}][block_number]" value="${blockIndex}">
            
            <!-- Block Area Input -->
            <label class="block text-gray-700 font-bold mt-2">Block Area (sq meters)</label>
            <input type="number" name="blocks[${blockIndex}][block_area]" class="w-full border rounded py-2 px-3 mb-2" required>

            <div class="houses-container mb-2"></div>
            <button type="button" class="add-house bg-gray-500 text-white px-3 py-1 rounded">Add House</button>
        `;

        blockContainer.appendChild(blockDiv);

        blockDiv.querySelector('.add-house').addEventListener('click', function() {
            const houseContainer = blockDiv.querySelector('.houses-container');
            const houseIndex = houseContainer.children.length;

            const houseDiv = document.createElement('div');
            houseDiv.classList.add('mb-2');
            houseDiv.innerHTML = `
                <label>House Number</label>
                <input type="text" name="blocks[${blockIndex}][houses][${houseIndex}][house_number]" required>


                <!-- House Area Input -->
                <label class="block text-gray-700 font-bold mt-2">House Area (sq meters)</label>
                <input type="number" name="blocks[${blockIndex}][houses][${houseIndex}][house_area]" class="w-full border rounded py-2 px-3" required>

                <!-- House Status Dropdown -->
                <label class="block text-gray-700 font-bold mt-2">House Status</label>
                <select name="blocks[${blockIndex}][houses][${houseIndex}][house_status]" class="w-full border rounded py-2 px-3" required>
                    <option value="Available">Available</option>
                    <option value="Reserved">Reserved</option>
                </select>
            `;

            houseContainer.appendChild(houseDiv);
        });
    });
    </script>
</body>
</html>
