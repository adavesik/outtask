<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <!-- stylesheet -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css"
    />

    <!-- Ripple Effect from cdn -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Employee Management</h1>
        <div class="space-x-4">
            <button id="syncApiBtn" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Sync API</button>
            <button id="deleteEmployeesBtn" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Delete Employees</button>
        </div>
    </div>

    <div class="shadow-lg rounded-lg overflow-hidden mx-4 md:mx-10">
        <table class="w-full table-fixed">
            <thead>
            <tr class="bg-gray-100">
                <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Name</th>
                <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Email</th>
                <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">SSN</th>
            </tr>
            </thead>
            <tbody class="bg-white">
            @foreach ($employees as $employee)
                <tr class="bg-white">
                    <td class="py-4 px-6 border-b border-gray-200">{{ $employee->full_name }}</td>
                    <td class="py-4 px-6 border-b border-gray-200 truncate">{{ $employee->email }}</td>
                    <td class="py-4 px-6 border-b border-gray-200">{{ $employee->ssn }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
    $('#syncApiBtn').click(function() {
        $.ajax({
            url: '{{ route("employees.syncApi") }}',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                alert(response.message);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    $('#deleteEmployeesBtn').click(function() {
        if (confirm('Are you sure you want to delete all employees?')) {
            $.ajax({
                url: '{{ route("employees.deleteEmployees") }}',
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    alert(response.message);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
});

    </script>
</body>
</html>
