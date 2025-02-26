<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="flex h-screen">
        <aside class="bg-gray-800 text-white w-64 p-4 flex flex-col">
            <h2 class="text-2xl font-semibold mb-6">Admin Panel</h2>

            <nav class="flex-grow">
                <ul>
                    <li class="mb-2">
                        <a href="#" class="block p-2 rounded hover:bg-gray-700 transition duration-300">Dashboard</a>
                    </li>
                    <li class="mb-2">
                        <a href="/admin/listings" class="block p-2 rounded hover:bg-gray-700 transition duration-300">Listings</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="block p-2 rounded hover:bg-gray-700 transition duration-300">Inquiries</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="block p-2 rounded hover:bg-gray-700 transition duration-300">Users</a>
                    </li>
                </ul>
            </nav>

            <div class="flex h-screen">
        <aside class="bg-gray-800 text-white w-64 p-4 flex flex-col">
            <div class="mt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white p-2 rounded transition duration-300">Logout</button>
                </form>
            </div>
        </aside>

    </div>

</body>
</html>