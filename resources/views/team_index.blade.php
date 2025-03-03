<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $member->name }} - Team Member</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
</head>
<body class="bg-gray-100 py-10 px-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-lg text-center">
        <img src="{{ asset('storage/' . $member->image) }}" 
             alt="{{ $member->name }}" 
             class="w-40 h-40 mx-auto rounded-full object-cover mb-4 shadow-md">
             
        <h2 class="text-3xl font-bold text-gray-800">{{ $member->name }}</h2>
        <p class="text-lg text-gray-600">{{ $member->position }}</p>
        <p class="text-sm text-gray-500 mt-2">📞 {{ $member->contact_number }}</p>
        <p class="text-sm text-gray-500">✉️ {{ $member->email }}</p>
        <p class="mt-4 text-gray-700 italic">"{{ $member->motto }}"</p>

        <a href="{{ url()->previous() }}" 
           class="mt-6 inline-block text-blue-500 hover:underline">← Back</a>
    </div>
</body>
</html>
