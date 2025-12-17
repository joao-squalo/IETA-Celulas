<div>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-white">Cadastrar nova Célula</h1>
            <x-red-btn-link :url="route('cells.index')" :text="'Voltar'" />
        </div>

        <form wire:submit="save">
            <div class="mt-10 w-full flex-col flex justify-center items-center">
                <div class="h-full w-100">
                    <div class="mb-5 w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Rede</label>
                        <select id="networkID" wire:model="networkID" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="">Selecione uma rede</option>
                            @foreach ($networks as $network)
                                <option value="{{ $network->id }}">{{ $network->name }} ( {{ $network->church->name }} )</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-5 w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Nome</label>
                        <input wire:model.live="name" type="text" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "
                            required />
                        @error('name')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-10 flex justify-end w-full">
                        <button type="submit"
                            class="text-white bg-green-700 cursor-pointer transition duration-300 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full h-full sm:w-auto px-5 py-2.5 text-center">Salvar</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
