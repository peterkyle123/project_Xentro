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

        <!-- Sidebar -->
        <aside class="bg-gray-800 text-white w-64 p-6 flex flex-col shadow-lg">
            <h2 class="text-3xl font-semibold text-center mb-8">Admin Panel</h2>

            <nav class="flex-grow">
                <ul>
                    <li class="mb-4">
                        <a href="#" class="block p-3 rounded-lg hover:bg-gray-700 transition duration-300">Dashboard</a>
                    </li>
                    <li class="mb-4">
                        <a href="/admin/listings" class="block p-3 rounded-lg hover:bg-gray-700 transition duration-300">Listings</a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="block p-3 rounded-lg hover:bg-gray-700 transition duration-300">Inquiries</a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="block p-3 rounded-lg hover:bg-gray-700 transition duration-300">Users</a>
                    </li>
                </ul>
            </nav>

            <div class="mt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white p-3 rounded-lg transition duration-300">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 bg-gray-50 p-8">
            <!-- You can add your content here, such as tables, charts, or other components -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-2xl font-semibold">Welcome to the Admin Dashboard</h3>
                <!-- Add other content here -->
            </div>
        </main>

    </div>

</body>

</html>
