<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex min-h-screen bg-gray-100">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white flex flex-col">
        <div class="p-4 text-2xl font-bold border-b border-gray-700">
            Admin Panel
        </div>
        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('admin.dashboard') }}"
                class="block px-3 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.tasks.index') }}"
                class="block px-3 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('admin.tasks.*') ? 'bg-gray-700' : '' }}">
                Tasks
            </a>

            <a href="{{ route('admin.applicants.index') }}"
                class="block px-3 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('admin.applicants.*') ? 'bg-gray-700' : '' }}">
                Applicants
            </a>
        </nav>
        <div class="p-4 border-t border-gray-700">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="w-full bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded">Logout</button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</body>

</html>