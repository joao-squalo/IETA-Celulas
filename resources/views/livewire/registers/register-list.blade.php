<div>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-white">Registros</h1>
            <x-red-btn-link :url="route('cells.new')" :text="'Criar Rede'" />
        </div>

        <div class="mt-10">
            <div class="relative overflow-x-auto">
                <table class="w-full border-b border-white text-sm text-left rtl:text-right text-gray-400">
                    <thead class="text-xs text-white uppercase bg-red-950">
                        <tr class=" border border-red-950">
                            <th scope="col" class="px-6 py-3">
                                Célula
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Data
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Criado Por
                            </th>
                            <th scope="col" class="px-6 py-3 text-end">
                                Opções
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registers as $register)
                            <tr class="border border-red-950 bg-zinc-950">
                                <th scope="row"
                                    class="flex items-center px-6 py-4 font-medium text-white whitespace-nowrap">
                                    {{ $register->cell->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $register->cell_date->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $register->user->name }}
                                </td>
                                <td class="px-6 py-4 text-end">
                                    <a href="{{route('registers.show', $register->id)}}"
                                        class="text-red-400 hover:underline">Ver detalhes</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
