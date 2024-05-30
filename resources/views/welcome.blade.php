<!-- resources/views/notebooks/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notebooks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Notebooks</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($notebooks as $notebook)
            <tr>
                <td>{{ $notebook->id }}</td>
                <td>{{ $notebook->title }}</td>
                <td>{{ $notebook->created_at }}</td>
                <td>{{ $notebook->updated_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $notebooks->links() }}
</div>
</body>
</html>
