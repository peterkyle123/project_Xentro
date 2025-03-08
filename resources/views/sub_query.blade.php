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

    @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
      </div>
    @endif

    <form action="{{ route('sub_queries.store') }}" method="POST">
      @csrf

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
        <input type="text" name="purpose" id="purpose" class="w-full border rounded py-2 px-3" placeholder="e.g. Pricing, features, etc." required>
      </div>

      <div class="mb-4">
        <label for="lot" class="block text-gray-700 text-sm font-bold mb-2">Lot</label>
        <input type="text" name="lot" id="lot" class="w-full border rounded py-2 px-3" required>
      </div>

      <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
        Submit Query
      </button>
    </form>
  </div>

  <script>
    // Ensure that the phone number field accepts only numeric input (up to 11 digits)
    document.getElementById('phone_number').addEventListener('input', function(event) {
      let inputValue = event.target.value;
      // Remove non-numeric characters
      let numericValue = inputValue.replace(/\D/g, '');
      // Limit to 11 digits
      if (numericValue.length > 11) {
        numericValue = numericValue.slice(0, 11);
      }
      event.target.value = numericValue;
    });
  </script>
</body>
</html>
