<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submit Your Query</title>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Submit Your Query</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Error Message (Non-Modal Version for Consistency) -->
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @if($subdivision)
            <div class="mb-4">
                <img src="{{ asset('storage/' . $subdivision->plot) }}" alt="{{ $subdivision->sub_name }}" class="max-w-full h-auto rounded">
            </div>
        @endif

        <form action="{{ route('sub_queries.store') }}" method="POST">
            @csrf
            <input type="hidden" name="subdivision_id" value="{{ $subdivision->id }}"> <!-- Ensure this is correct -->

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" name="name" id="name" class="w-full border rounded py-2 px-3" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" name="email" id="email" class="w-full border rounded py-2 px-3" required>
            </div>

            <div class="mb-4">
                <label for="phone_number" class="block text-gray-700 text-sm font-bold mb-2">Contact Number</label>
                <input type="text" name="phone_number" id="phone_number" class="w-full border rounded py-2 px-3" required>
            </div>

            <div class="mb-4">
                <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address</label>
                <input type="text" name="address" id="address" class="w-full border rounded py-2 px-3" required>
            </div>

            <div class="mb-4">
                <label for="purpose" class="block text-gray-700 text-sm font-bold mb-2">Subject</label>
                <textarea name="purpose" id="purpose" class="w-full border rounded py-2 px-3" placeholder="e.g. Pricing, features, etc." required></textarea>
            </div>

            <div class="mb-4">
                <label for="block" class="block text-gray-700 text-sm font-bold mb-2">Interested at Block</label>
                <input type="text" name="block" id="block" class="w-full border rounded py-2 px-3" required>
            </div>

            <div class="mb-4">
                <label for="lot" class="block text-gray-700 text-sm font-bold mb-2">Interested at Lot</label>
                <input type="text" name="lot" id="lot" class="w-full border rounded py-2 px-3" required>
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
                Submit Query
            </button>
        </form>
    </div>

    <script>
        // Ensure the phone number field accepts only numeric input (up to 11 digits)
        document.getElementById('phone_number').addEventListener('input', function(event) {
            let inputValue = event.target.value;
            let numericValue = inputValue.replace(/\D/g, ''); // Remove non-numeric characters
            if (numericValue.length > 11) {
                numericValue = numericValue.slice(0, 11); // Limit to 11 digits
            }
            event.target.value = numericValue;
        });
    </script>
</body>
</html>
