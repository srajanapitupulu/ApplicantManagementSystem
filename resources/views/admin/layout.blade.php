<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
        }

        .sidebar {
            width: 220px;
            background: #2c3e50;
            color: white;
            height: 100vh;
            padding: 20px;
        }

        .sidebar h2 {
            margin-top: 0;
            font-size: 18px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 8px 0;
        }

        .sidebar a:hover {
            text-decoration: underline;
        }

        .content {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2>Admin</h2>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.tasks.index') }}">Task Management</a>
        {{-- placeholder for Applicant Management --}}
        <a href="#">Applicant Management</a>
        <hr>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" style="background:none;border:none;color:white;cursor:pointer;">
                Logout
            </button>
        </form>
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>

</html>