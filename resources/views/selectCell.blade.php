<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-black">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen">
    <div class="bg-black flex min-h-svh flex-col items-center mt-10 gap-6 md:p-10">
        <div class="flex w-full max-w-sm flex-col gap-2">
            <div class="flex flex-col gap-6">
                <div class="w-20 m-auto">
                    <img src="{{ asset('chama.png') }}" />

                </div>

                <span class="text-center text-white">Selecione a célula</span>
                @foreach ($cells as $cell)
                    <a href="{{ route('cells.register', $cell) }}"
                        class="text-white text-xl py-5 font-30 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 rounded-lg px-5 py-2.5 focus:outline-none"
                        style="background-color: {{ $cell->network->color }}; box-shadow: inset 0 0 0 1000px rgba(0,0,0,0.6);">
                        <strong>{{ $cell->name }}</strong><br />
                        <small>{{ $cell->network->name }}</small>
                    </a>
                @endforeach

                @if (Auth::user()->is_admin || Auth::user()->churches()->exists() || Auth::user()->networks()->exists() || Auth::user()->cells()->exists())
                    <a href="{{ route('dashboard') }}"
                        class="text-red-700 mt-10 text-xl py-5 font-30 bg-slate-200 hover:bg-slate-300 focus:ring-4 focus:ring-red-300 rounded-lg px-5 py-2.5 focus:outline-none">
                        <strong>Painel Administrador</strong>
                    </a>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
