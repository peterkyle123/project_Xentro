<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin Account</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <!-- Add Font Awesome CDN for the icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Ensure the image container is relative for absolute positioning */
        .image-container {
            position: relative;
            display: inline-block;
        }

        /* Style the camera icon in the top-left corner */
        .camera-icon {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 5px;
            border-radius: 50%;
            color: white;
            cursor: pointer;
        }

        .camera-icon:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="container mx-auto p-8 w-full max-w-md">
        <h1 class="text-3xl font-semibold mb-6 text-gray-800 text-center">Edit Admin Account</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 text-center" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data" id="admin-update-form">
            @csrf
            @method('PUT')

            <!-- Profile Picture Section with Icon Button -->
            <div class="mb-4 text-center">
                <label for="profile_pic" class="block text-gray-700 text-sm font-bold mb-2">Profile Picture</label>

                <!-- Image Container with Icon Positioned -->
                <div class="image-container">
                    <!-- Camera Icon Positioned in the Top Left Corner -->
                    <button type="button" class="camera-icon" id="change-profile-btn">
                        <i class="fas fa-camera"></i>
                    </button>

                    <!-- Image Preview -->
                    <div id="image-preview">
                        @if($admin->profile_pic)
                            <img src="{{ asset('storage/' . $admin->profile_pic) }}" alt="Profile Picture" class="max-h-32 mx-auto">
                        @endif
                    </div>
                </div>
                
                <!-- Hidden File Input -->
                <input type="file" name="profile_pic" id="profile_pic" class="hidden" accept="image/*">
            </div>

            <!-- Username Section -->
            <div class="mb-4">
                <label for="username" class="block text-gray-700 text-sm font-bold mb-2 text-center">Username</label>
                <input type="text" name="username" id="username" class="w-full border rounded py-2 px-3 text-gray-700 mx-auto block" value="{{ $admin->username }}" required>
                @error('username')
                <p class="text-red-500 text-xs italic text-center">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Section -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2 text-center">Email</label>
                <input type="email" name="email" id="email" class="w-full border rounded py-2 px-3 text-gray-700 mx-auto block" value="{{ $admin->email }}" required>
                @error('email')
                <p class="text-red-500 text-xs italic text-center">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Section -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2 text-center">New Password (leave blank to keep current)</label>
                <input type="password" name="password" id="password" class="w-full border rounded py-2 px-3 text-gray-700 mx-auto block">
                @error('password')
                <p class="text-red-500 text-xs italic text-center">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password Section -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2 text-center">Confirm New Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border rounded py-2 px-3 text-gray-700 mx-auto block" placeholder="Confirm your new password">
            </div>

            <!-- Update Button -->
            <div class="text-center">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded" id="update-button">
                    Update Account
                </button>
            </div>
              <!-- Back to Home Button -->
              <div class="text-center mt-4">
                <a href="/admin/dashboard">
                    <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded">
                        Back to Home
                    </button>
                </a>
            </div>
        </form>
    </div>

    <script>
        const profilePicInput = document.getElementById('profile_pic');
        const changeProfileBtn = document.getElementById('change-profile-btn');
        const imagePreview = document.getElementById('image-preview');
        const updateButton = document.getElementById('update-button');
        const adminUpdateForm = document.getElementById('admin-update-form');

        // Trigger the hidden file input when the button is clicked
        changeProfileBtn.addEventListener('click', function() {
            profilePicInput.click();
        });

        // Handle file input change event
        profilePicInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.innerHTML = `<img src="${e.target.result}" alt="Preview" class="max-h-32 mx-auto">`;
                }

                reader.readAsDataURL(this.files[0]);
            } else {
                imagePreview.innerHTML = '';
                @if($admin->profile_pic)
                    imagePreview.innerHTML = `<img src="{{ asset('storage/' . $admin->profile_pic) }}" alt="Profile Picture" class="max-h-32 mx-auto">`;
                @endif
            }
        });

        // Handle form submit to show loading state
        adminUpdateForm.addEventListener('submit', function() {
            updateButton.disabled = true;
            updateButton.innerHTML = 'Updating...'; // Show loading indicator
        });
    </script>
</body>
</html>
