<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex min-h-screen bg-gray-100">

    <!-- Sidebar (fixed) -->
    <aside class="w-64 bg-gray-800 text-white flex flex-col fixed top-0 left-0 bottom-0">
        <div class="p-4 text-2xl font-bold border-b border-gray-700">
            Admin Panel
        </div>

        <!-- Navigation -->
        <nav class="flex-1 p-4 space-y-2 overflow-auto">
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

        <!-- Logout button always at bottom -->
        <div class="p-4 border-t border-gray-700 mt-auto">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="w-full bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded">Logout</button>
            </form>
        </div>
    </aside>

    <!-- Main Content (with left margin to account for sidebar) -->
    <main class="flex-1 p-6 ml-64">
        @yield('content')
    </main>

</body>

</html>