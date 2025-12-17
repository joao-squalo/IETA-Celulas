<div>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-white">{{ $cell->name }}</h1>
            <x-red-btn-link :url="route('cells.index')" :text="'Voltar'" />
        </div>
        <div class="mt-10 mb-30">
            <form wire:submit="save">
                <div class="flex h-full w-100 items-start m-auto flex-col justify-center">
                    <div class="mb-5 w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Rede</label>
                        <select id="networkID" wire:model="networkID" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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
                </div>
                <div class="w-100 m-auto mt-10 flex flex-col justify-between">
                    <button type="submit"
                        class="text-white bg-green-700 cursor-pointer transition duration-300 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Salvar</button>
                    <button
                        class="mt-5 text-white bg-red-700 cursor-pointer transition duration-300 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Excluir</button>

                </div>
            </form>
        </div>
        <hr />
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-white">Líderes da Célula</h1>
            <button wire:click="openModal"
                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none cursor-pointer">Vincular
                lider</button>

        </div>
        <div class="mt-10">
            <div class="relative overflow-x-auto">
                <table class="w-full border-b border-white text-sm text-left rtl:text-right text-gray-400">
                    <thead class="text-xs text-white uppercase bg-red-950">
                        <tr class=" border border-red-950">
                            <th scope="col" class="px-6 py-3">
                                Nome
                            </th>
                            <th scope="col" class="px-6 py-3">
                                E-mail
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Data de vínculo
                            </th>
                            <th scope="col" class="px-6 py-3 text-end">
                                Opções
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cell->users as $user)
                            <tr class="border border-red-950 bg-zinc-950">
                                <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                    {{ $user->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->pivot->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td class="px-6 py-4 text-end">
                                    <a wire:click="remove({{ $user->id }})"
                                        class="cursor-pointer text-red-400 hover:underline">Desvincular</a>
                                </td>
                            </tr>
                        @empty
                            <tr class=" border-b border-white">
                                <td colspan="4" class="px-6 py-4 font-medium text-white whitespace-nowrap">Nenhum
                                    usuário vinculado</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @if ($isOpen)
        <div class="transition-opacity duration-300 fixed inset-0 flex items-center justify-center z-50">
            <!-- Fundo escuro -->
            <div class="absolute inset-0 bg-black opacity-50" wire:click="closeModal"></div>

            <!-- Conteúdo do modal -->
            <div class="bg-white rounded-lg shadow-lg p-6 z-10 w-96 relative">
                <h2 class="text-xl text-red-700 font-bold mb-4">Vincular Líder</h2>
                <form wire:submit="add">
                    <div>
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-black">E-mail</label>
                            <input wire:model.live="userMail" type="mail" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 "
                                required />
                            @error('userMail')
                                <span class="text-red-900">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Exemplo de botão de ação -->
                    <div class="flex justify-end">
                        <button class="mt-4 bg-red-700 hover:bg-red-800 text-white px-4 py-2 rounded"
                            wire:click="closeModal">
                            Fechar
                        </button>

                        <button class="mt-4 ml-2 bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded"
                            type="submit">
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
    @endif
</div>
