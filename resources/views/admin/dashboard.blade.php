<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
</head>

<body>
    <h2>Welcome to the Admin Dashboard</h2>

    <ul>
        <li><a href="{{ route('admin.tasks.index') }}">Manage Tasks</a></li>
        {{-- later we’ll add Applicant Management here --}}
    </ul>

    <a href="{{ route('admin.logout') }}">Logout</a>
</body>

</html>