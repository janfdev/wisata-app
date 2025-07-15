<!DOCTYPE html >
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Wisata Cirebon</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">
    <nav class="bg-white shadow p-4 flex items-center justify-between">
        <div class="font-bold text-xl flex items-center gap-2 text-amber-600">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M33.724 36.5809C37.7426 32.5622 40.0003 27.1118 40.0003 21.4286C40.0003 15.7454 37.7426 10.2949 33.724 6.27629C29.7054 2.25765 24.2549 1.02188e-06 18.5717 0C12.8885 -1.02188e-06 7.43807 2.25764 3.41943 6.27628L10.4905 13.3473C11.6063 14.4631 13.4081 14.4074 14.8276 13.7181C15.9836 13.1568 17.2622 12.8571 18.5717 12.8571C20.845 12.8571 23.0252 13.7602 24.6326 15.3677C26.2401 16.9751 27.1431 19.1553 27.1431 21.4286C27.1431 22.7381 26.8435 24.0167 26.2822 25.1727C25.5929 26.5922 25.5372 28.394 26.6529 29.5098L33.724 36.5809Z" fill="#ffbf00"></path>
                <path d="M30 40H19.5098C17.9943 40 16.5408 39.398 15.4692 38.3263L1.67368 24.5308C0.60204 23.4592 0 22.0057 0 20.4902V10L30 40Z" fill="#ffbf40"></path>
                <path d="M10.7143 39.9999H4.28571C1.91878 39.9999 0 38.0812 0 35.7142V29.2856L10.7143 39.9999Z" fill="#ffbf40"></path>
                </svg>
        <p>Wisata Cirebon</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('home') }}" class="text-gray-700 hover:text-amber-600">Beranda</a>
            @auth
                <span class="text-gray-700 mr-4 capitalize">Halo, {{ auth()->user()->name }}</span>
                <a href="{{ route('pesanan.saya') }}" class="text-gray-700 hover:text-amber-600">Pesanan Saya</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-red-600">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-amber-600">Login</a>
                <a href="{{ route('register') }}" class="text-gray-700 hover:text-amber-600">Daftar</a>
            @endauth
        </div>
    </nav>

    <main class="h-screen p-6">
        @yield('content')
    </main>

</body>
</html>

