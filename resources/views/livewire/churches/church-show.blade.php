<div>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-white">{{ $churchName }}</h1>
            <x-red-btn-link :url="route('churches.index')" :text="'Voltar'" />
        </div>

        <div class="mt-10">
            <form wire:submit="save">
                <div>
                    <div class="mb-5">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Nome da Igreja</label>
                        <input wire:model.live="churchName" type="text" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "
                            required />
                        @error('churchName')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Salvar</button>
                </div>
            </form>
        </div>

    </div>
</div>
