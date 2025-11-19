<div>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-white">{{$user->name}}</h1>
            <x-red-btn-link :url="route('churches.index')" :text="'Voltar'" />
        </div>

        <div class="mt-10">
            <form wire:submit="save">
                <div class="flex h-full w-full items-center justify-center">
                    <div class="mb-5 mx-5 w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Nome Completo</label>
                        <input wire:model.live="name" type="text" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "
                            required />
                        @error('name')
                            <span class="text-red-900">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5 mx-5 w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">E-mail</label>
                        <input wire:model.live="email" type="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "
                            required />
                        @error('email')
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
