<div>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-white">Redes</h1>
            <x-red-btn-link :url="route('networks.new')" :text="'Criar Rede'" />
        </div>

         <div class="mt-10">
                <div class="relative overflow-x-auto">
                    <table class="w-full border-b border-white text-sm text-left rtl:text-right text-gray-400">
                        <thead class="text-xs text-white uppercase bg-red-950">
                            <tr class=" border border-red-950">
                                <th scope="col" class="px-6 py-3">
                                    Nome da Rede
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Igreja
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Data de Criação
                                </th>
                                <th scope="col" class="px-6 py-3 text-end">
                                    Opções
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($networks as $network)
                                <tr class="border border-red-950 bg-zinc-950">
                                    <th scope="row" class="flex items-center px-6 py-4 font-medium text-white whitespace-nowrap">
                                        <div class="w-3 h-3 mr-3 rounded-full" style="background-color: {{ $network->color }};"></div> {{ $network->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $network->church->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $network->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-end">
                                        <a href="{{route('networks.show', $network->id)}}"
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
