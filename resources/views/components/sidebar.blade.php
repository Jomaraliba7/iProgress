<aside class="flex flex-col h-screen w-64 bg-gray-800 text-white fixed top-0 left-0 z-30">
    <div class="p-4 flex flex-row gap-2">
         <!-- Logo -->
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('images/nciplogo.png') }}" alt="Logo" class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
            </a>
        <h1 class="text-2xl font-semibold">{{ config('app.name') }}</h1>
    </div>

    <nav class="flex-1 overflow-y-auto">
        <ul class="space-y-2 p-4">
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-300 {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('myprojects') }}" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-700 {{ request()->routeIs('myprojects') ? 'bg-gray-700' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 6a2 2 0 012-2h4l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                    </svg>
                    <span>My Projects</span>
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-700 {{ request()->routeIs('about') ? 'bg-gray-700' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zm0 12a1 1 0 110 2 1 1 0 010-2zm.75-9a3.25 3.25 0 00-3.25 3 .75.75 0 001.5 0 1.75 1.75 0 113.5 0c0 1.5-1.5 1.75-1.5 3a.75.75 0 001.5 0c0-1 .75-1.25 1.5-2.25.75-.875.75-2.25 0-3.125A3.25 3.25 0 0010.75 5z" clip-rule="evenodd"/>
                    </svg>
                    <span>About the System?</span>
                 </a>
            </li>
            <!-- Add more menu items as needed -->
        </ul>
    </nav>

    <div class="p-4 border-t border-gray-700">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-700 w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                </svg>
                <span>Log out</span>
            </button>
        </form>
    </div>
</aside>

