<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body class="bg-gray-100 p-4">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-3xl font-semibold mb-6 text-center text-gray-800">Contact Information</h2>

        <div class="mb-6">
            <div class="flex items-center mb-2">
                <i class="fas fa-map-marker-alt text-gray-600 mr-3"></i>
                <strong class="block font-medium">Address:</strong>
            </div>
            <span class="block text-gray-700">WPI Bldg., St. Peter St. Doña Maria Village 1, Punta Princesa, Cebu City
            </span>
        </div>

        <div class="mb-6">
            <div class="flex items-center mb-2">
                <i class="fas fa-phone-alt text-gray-600 mr-3"></i>
                <strong class="block font-medium">Phone:</strong>
            </div>
            <span class="block text-gray-700">+1 (555) 123-4567</span>
        </div>

        <div class="mb-6">
            <div class="flex items-center mb-2">
                <i class="fas fa-envelope text-gray-600 mr-3"></i>
                <strong class="block font-medium">Email:</strong>
            </div>
            <span class="block text-gray-700">info@example.com</span>
        </div>

        <div class="mb-6">
            <div class="flex items-center mb-2">
                <i class="fas fa-globe text-gray-600 mr-3"></i>
                <strong class="block font-medium">Website:</strong>
            </div>
            <a href="https://www.example.com" class="text-blue-500 hover:underline">www.example.com</a>
        </div>

        <div class="mb-6">
            <div class="flex items-center mb-2">
                <strong class="block font-medium">Social Media:</strong>
            </div>
            <div class="flex space-x-4">
                <a href="https://www.facebook.com/example" class="text-blue-500 hover:underline"><i class="fab fa-facebook-f"></i> Facebook</a>
                <a href="https://www.twitter.com/example" class="text-blue-500 hover:underline"><i class="fab fa-twitter"></i> Twitter</a>
                <a href="https://www.instagram.com/example" class="text-blue-500 hover:underline"><i class="fab fa-instagram"></i> Instagram</a>
            </div>
        </div>
    </div>
</body>
</html>