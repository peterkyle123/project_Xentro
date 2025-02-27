<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>
<body>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">Edit Admin Account</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <form action="{{ route('admin.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
            <input type="text" name="username" id="username" class="w-full border rounded py-2 px-3" value="{{ $admin->username }}">
            @error('username')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">New Password (leave blank to keep current)</label>
            <input type="password" name="password" id="password" class="w-full border rounded py-2 px-3">
            @error('password')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm New Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border rounded py-2 px-3">
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">Update Account</button>
    </form>
</div>
</body>
</html>