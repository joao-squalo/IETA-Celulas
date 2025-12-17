<div>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-white">Cadastrar nova Rede</h1>
            <x-red-btn-link :url="route('networks.index')" :text="'Voltar'" />
        </div>

        <div class="mt-10">
            <form wire:submit="save">
                <div class="flex h-full w-full items-center justify-center">
                    <div class="mb-5 mx-5 w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Igreja</label>
                        <select id="churchID" wire:model="churchID" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="">Selecione uma igreja</option>
                            @foreach ($churches as $church)
                                <option value="{{ $church->id }}">{{ $church->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-5 mx-5 w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Nome</label>
                        <input wire:model.live="name" type="text" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "
                            required />
                        @error('name')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5 mx-5 w-30">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Cor</label>
                        <input wire:model.live="color" type="color" id="color" class="w-10 h-10 w-full"
                            required />
                        @error('color')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="text-white mr-5 bg-green-700 cursor-pointer transition duration-300 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Salvar</button>
                </div>
            </form>
        </div>
    </div>
