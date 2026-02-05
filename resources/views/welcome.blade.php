<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body class="bg-[#000000] text-[#EDEDEC] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="inline-block px-5 py-1.5 border text-[#EDEDEC] border-[#3E3E3A] hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 border text-[#EDEDEC] border-[#3E3E3A] hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        Log in
                    </a>
                @endauth
            </nav>
        @endif
    </header>
    <div
        class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 grow starting:opacity-0">
        <main class="flex flex-col justify-center max-w-[500px] w-full">
            <img src="{{ asset('logo.png') }}" />
            <p class="text-center text-white font-bold text-3xl mt-4">Sistema de Células</p>
        </main>
    </div>
    <footer class="text-white text-center">
        Desenvolvido por
        <a href="https://www.squalotech.com.br" target="blank"
            class="text-red-500 hover:text-red-300 transition-all duration-400 font-bold">Squalo
            Technologies</a>
    </footer>
    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
