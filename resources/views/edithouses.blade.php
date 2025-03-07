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
<div class="container">
    <h2>{{ $subdivision->sub_name }} - Houses</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Block Number</th>
                <th>House Number</th>
                <th>House Area</th>
                <th>House Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subdivision->houses as $house)
                <tr>
                    <td>{{ $house->block_number }}</td>
                    <td>{{ $house->house_number }}</td>
                    <td>{{ $house->house_area }} sq.m</td>
                    <td>{{ $house->house_status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>