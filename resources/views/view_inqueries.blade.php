<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Inquiries</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">View Inquiries</h1>

        <div class="mb-4 flex justify-between items-center">
            <a href="/admin/dashboard" class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded">
                Back to Dashboard
            </a>
            <form id="bulkDeleteForm" action="{{ route('admin.inquiries.bulkDelete') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete the selected inquiries?')">
                    Delete Selected
                </button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <input type="checkbox" id="selectAll">
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Listing Title</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Address</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Message</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($inquiries as $inquiry)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="checkbox" name="inquiries[]" value="{{ $inquiry->id }}" class="inquiry-checkbox">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inquiry->listing->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inquiry->listing->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inquiry->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inquiry->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inquiry->phone_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inquiry->address }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inquiry->message }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $inquiry->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $inquiries->links() }}
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllCheckbox = document.getElementById('selectAll');
            const inquiryCheckboxes = document.querySelectorAll('.inquiry-checkbox');

            selectAllCheckbox.addEventListener('change', function() {
                inquiryCheckboxes.forEach(checkbox => {
                    checkbox.checked = selectAllCheckbox.checked;
                });
            });

            inquiryCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const allChecked = Array.from(inquiryCheckboxes).every(checkbox => checkbox.checked);
                    selectAllCheckbox.checked = allChecked;
                });
            });
        });
        document.getElementById('bulkDeleteForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        this.submit(); // Submit the form using JavaScript
    });
    </script>
</body>
</html>