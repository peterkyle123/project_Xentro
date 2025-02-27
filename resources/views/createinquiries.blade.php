<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquire About {{ $listing->title }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Inquire About {{ $listing->title }}</h1>

        <form action="{{ route('inquiries.store', $listing->id) }}" method="POST">
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
                <label for="contact_info" class="block text-gray-700 text-sm font-bold mb-2">Contact Info</label>
                <input type="text" name="contact_info" id="contact_info" class="w-full border rounded py-2 px-3" required>
            </div>

            <div class="mb-4">
                <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address</label>
                <input type="text" name="address" id="address" class="w-full border rounded py-2 px-3" required>
            </div>

            <div class="mb-4">
                <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Message</label>
                <textarea name="message" id="message" class="w-full border rounded py-2 px-3" rows="4" required></textarea>
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">Submit Inquiry</button>
        </form>
    </div>
</body>
</html>