<div>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-white">Igrejas</h1>
            <x-red-btn-link :url="'#'" :text="'Criar Igreja'" />
        </div>

         <div class="mt-10">
                <div class="relative overflow-x-auto shadow-md rounded-lg">
                    <table class="w-full border-b border-white text-sm text-left rtl:text-right text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nome da Igreja
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
                            @foreach ($churches as $church)
                                <tr class=" border-b border-white">
                                    <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                        {{ $church->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $church->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-end">
                                        <a href="{{route('churches.show', $church->id)}}"
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
