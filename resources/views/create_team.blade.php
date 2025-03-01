<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Team Member</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div class="w-full max-w-lg bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Add New Team Member</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded-md mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">

        @csrf  
    
 <!-- This is required for security -->
    
    <div class="mb-4">
        <label class="block text-gray-700 font-semibold">Name</label>
        <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-semibold">Position</label>
        <input type="text" name="position" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-semibold">Contact Number</label>
        <input type="text" name="contact_number" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-semibold">Email</label>
        <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-semibold">Motto</label>
        <textarea name="motto" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"></textarea>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-semibold">Profile Picture</label>
        <input type="file" name="image" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Add Team Member</button>
</form>

    </div>

</body>
</html>
