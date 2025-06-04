<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Crypto Invest Tracker')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>


</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-gray-100 min-h-screen flex flex-col">

    {{-- HEADER / NAVIGATION --}}
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('logo.png') }}" class="h-8" alt="Crypto Invest Tracker Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Crypto Invest Tracker</span>
            </a>

           

                        <ul>
                            <a href="investments" class="block px-4 py-2 text-sm text-white hover:bg-gray-700 dark:hover:bg-gray darl:text-gray-200 dark:hover:text-white">Portfolio</a>
                        </ul>
                        <ul>
                            <a href="news" class="block px-4 py-2 text-sm text-white  hover:bg-gray-700 dark:hover:bg-gray darl:text-gray-200 dark:hover:text-white">News</a>
                        </ul>
                        <ul>
                            <a href="tracker" class="block px-4 py-2 text-sm text-white  hover:bg-gray-700 dark:hover:bg-gray darl:text-gray-200 dark:hover:text-white">Chart</a>
                        </ul>
                        <ul>
                            <a href="market" class="block px-4 py-2 text-sm text-white  hover:bg-gray-700 dark:hover:bg-gray darl:text-gray-200 dark:hover:text-white">Marktübersicht</a>
                        </ul>


                    </ul>
                </div>

            </div>

            <div class="items-center justify-between hidden w-full mf:flex md:w-auto md:order-1" id="navbar-user">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 drk:border-gray-700">
                    <li>
                        <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
                    </li>
                    <li>
                      <a href="#" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">investments</a>
                    </li>
                    <li>
                      <a href="#" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">News</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


            {{-- Mobile menu button --}}
            <div class="md:hidden">
                <button id="mobile-menu-button" aria-label="Menü" class="focus:outline-none focus:ring-2 focus:ring-green-400 rounded">
                    <svg class="w-7 h-7 text-gray-300" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        {{-- Mobile nav menu --}}
        <div id="mobile-menu" class="hidden md:hidden bg-gray-800 bg-opacity-90 px-6 pb-4 space-y-2 border-t border-gray-700">
            <a href="{{ route('investments.index') }}"
               class="block py-2 text-green-400 font-semibold">
                Portfolio
            </a>
            <a href="{{ route('news.index') }}"
               class="block py-2 text-blue-400 font-semibold">
                News
            </a>
        </div>
    </header>

    {{-- MAIN CONTENT --}}
    <main class="flex-grow container mx-auto px-6 py-10 max-w-7xl">
        @if(session('success'))
            <div class="bg-green-600 bg-opacity-90 text-white px-4 py-3 rounded mb-8 shadow-md max-w-3xl mx-auto">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-gray-800 bg-opacity-60 text-center text-sm text-gray-400 py-6 select-none border-t border-gray-700">
        © {{ date('Y') }} Crypto Invest Tracker. Entwickelt mit ❤️.
    </footer>

    {{-- Mobile menu toggle script --}}
    <script>
        const menuBtn = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>

