<div>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-white">Célula {{ $register->cell->name }} -
                {{ $register->cell_date->format('d/m/Y') }}</h1>
            <x-red-btn-link :url="route('registers.index')" :text="'Voltar'" />
        </div>
        <div class="mt-10 mb-30">
            <form wire:submit="save">
                <div class="flex h-full w-100 items-start m-auto flex-col justify-center">
                    <div class="mb-5 w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Data</label>
                        <input wire:model.live="cell_date" type="text" id="name"
                            class="date bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "
                            required />
                        @error('name')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5 w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Quantas Pessoas
                            Presentes?</label>
                        <input wire:model.live="totPeople" type="text" id="name"
                            class="number bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "
                            required />
                        @error('name')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5 w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Nomes das Pessoas
                            Presentes</label>
                        <textarea rows="10" wire:model.live="namePeople" type="text" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "
                            required></textarea>
                        @error('name')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5 w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Quantos Visitantes
                            Presentes?</label>
                        <input required wire:model.live="totVisitors" type="text" id="name"
                            class="number bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 " />
                        @error('name')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5 w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Nomes dos Visitantes
                            Presentes</label>
                        <textarea rows="10" wire:model.live="nameVisitors" type="text" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "></textarea>
                        @error('name')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5 w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Quantos Batismos com o Espírito Santo?</label>
                        <input required wire:model.live="totBaptism" type="text" id="name"
                            class="number bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 " />
                        @error('name')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5 w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Nomes dos Batizados com o Espírito Santo</label>
                        <textarea rows="10" wire:model.live="nameBaptism" type="text" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "></textarea>
                        @error('name')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5 w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Quantas Conversões?</label>
                        <input required wire:model.live="totConversions" type="text" id="name"
                            class="number bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 " />
                        @error('name')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5 w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Nomes dos Convertidos</label>
                        <textarea rows="10" wire:model.live="nameConversions" type="text" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "></textarea>
                        @error('name')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5 w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Valor Arrecadado de
                            Ofertas</label>
                        <input required wire:model.live="offer" type="text" id="name"
                            class="money bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 " />
                        @error('name')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5 w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Observações</label>
                        <textarea rows="10" wire:model.live="obs" type="text" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "></textarea>
                        @error('name')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="w-100 m-auto mt-10 flex flex-col justify-between">
                    <button type="submit"
                        class="text-white bg-green-700 cursor-pointer transition duration-300 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Salvar</button>
                    <button type="button" wire:click="delete"
                        onclick="return confirm('Tem certeza que deseja excluir?')"
                        class="mt-5 text-white bg-red-700 cursor-pointer transition duration-300 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Excluir</button>

                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
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
@endpush
