<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    style="background-color: {{ $cell->network->color }}; box-shadow: inset 0 0 0 1000px rgba(0,0,0,0.6);">

<head>
    @include('partials.head')

    <style>
        h1 {
            font-size: 30px;
            font-weight: bold;
            margin: 0;
        }

        h2 {
            margin: 0;
            font-size: 25px;
        }
    </style>
</head>

<body class="min-h-screen">

    <form method="POST" action="{{ route('cells.saveRegister') }}">
        @csrf
        <input type="hidden" name="cellID" value="{{ $cell->id }}" />
        <div class="flex min-h-svh flex-col items-center mt-10 gap-6 md:p-10">
            <div class="flex w-full max-w-sm flex-col gap-2">
                <div class="flex flex-col">
                    @if (session('success'))
                        <div class="max-w-sm mb-4 bg-green-100 px-4 py-3 text-green-800">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="mb-6">
                        <h1 class="text-center text-white">Célula {{ $cell->name }}</h1>
                        <h2 class="text-center" style="color: {{ $cell->network->color }}">{{ $cell->network->name }}
                        </h2>
                    </div>
                    <div class="mb-5 mx-5 w-full">
                        <label for="data" class="block mb-2 text-sm font-medium text-white">Data</label>
                        <input type="text" name="cell_date"
                            class="date bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "
                            required />
                        @error('data')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5 mx-5 w-full">
                        <label for="totPeople" class="block mb-2 text-sm font-medium text-white">Quantas Pessoas
                            Presentes?</label>
                        <input type="text" name="totPeople"
                            class="number bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "
                            required />
                        @error('totPeople')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5 mx-5 w-full">
                        <label for="namePeople" class="block mb-2 text-sm font-medium text-white">Nomes das Pessoas
                            Presentes</label>
                        <textarea rows="10" name="namePeople"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "
                            required></textarea>
                        @error('namePeople')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5 mx-5 w-full">
                        <label for="totVisitors" class="block mb-2 text-sm font-medium text-white">Quantas Visitantes
                            Presentes?</label>
                        <input type="text" name="totVisitors"
                            class="number bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "
                            required />
                        @error('totVisitors')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5 mx-5 w-full">
                        <label for="nameVisitors" class="block mb-2 text-sm font-medium text-white">Nomes dos Visitantes
                            Presentes</label>
                        <textarea rows="10" name="nameVisitors"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "></textarea>
                        @error('nameVisitors')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5 mx-5 w-full">
                        <label for="totBaptism" class="block mb-2 text-sm font-medium text-white">Quantos Batismos com o Espírito Santo?</label>
                        <input type="text" name="totBaptism"
                            class="number bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "
                            required />
                        @error('totBaptism')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5 mx-5 w-full">
                        <label for="nameBaptism" class="block mb-2 text-sm font-medium text-white">Nomes dos Batizados</label>
                        <textarea rows="10" name="nameBaptism"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "></textarea>
                        @error('nameBaptism')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5 mx-5 w-full">
                        <label for="totConversions" class="block mb-2 text-sm font-medium text-white">Quantas Conversões?</label>
                        <input type="text" name="totConversions"
                            class="number bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "
                            required />
                        @error('totConversions')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5 mx-5 w-full">
                        <label for="nameConversions" class="block mb-2 text-sm font-medium text-white">Nomes dos Convertidos</label>
                        <textarea rows="10" name="nameConversions"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "></textarea>
                        @error('nameConversions')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5 mx-5 w-full">
                        <label for="offer" class="block mb-2 text-sm font-medium text-white">Valor arrecadado de
                            Oferta</label>
                        <input type="text" name="offer"
                            class="money bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "
                            required />
                        @error('offer')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5 mx-5 w-full">
                        <label for="obs" class="block mb-2 text-sm font-medium text-white">Observações</label>
                        <textarea rows="10" name="obs"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "></textarea>
                        @error('obs')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5 mx-5 w-full">
                        <button type="submit"
                            class="text-white w-full bg-green-700 cursor-pointer transition duration-300 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Salvar</button>
                        <a href="{{ route('cells.select') }}"
                            class="block mt-3 text-white w-full bg-red-700 cursor-pointer transition duration-300 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        $(function() {
            $('.money').mask('000.000.000.000.000,00', {
                reverse: true
            });
            $('.number').mask('0000');
            $('.date').mask('00/00/0000');
        });
    </script>

</body>

</html>
