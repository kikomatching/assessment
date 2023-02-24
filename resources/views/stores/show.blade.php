<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="mt-16 py-8">
        <div class="bg-white relative shadow rounded-lg w-5/6 md:w-5/6  lg:w-4/6 xl:w-3/6 mx-auto">
            
            <div class="flex justify-center">
                <div style="background: rgba({{ $store->brand->color }}, .8)" class="rounded-full mx-auto absolute -top-20 w-32 h-32 shadow-md border-4 border-white transition duration-200 transform hover:scale-110"></div>
            </div>

            <div class="mt-16">
                <h1 class="font-bold text-center text-3xl text-gray-900">{{ $store->brand->name }}</h1>
                <h2 class="font-bold text-center text-1xl text-gray-900">#{{ $store->number }}</h1>
                <p class="text-center text-sm text-gray-400 font-medium">{{ $store->address }}</p>
                <p>
                    <span>
                        
                    </span>
                </p>
                <div class="flex justify-between items-center my-5 px-6"></div>

                <div class="w-full">
                    <h3 class="font-bold text-gray-900 text-center px-6">Journals</h3>
                    
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Date
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Revenue
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Food Cost
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Labor Cost
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Profit
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($store->journals as $journal)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                            {{ $journal->date }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                            {{ $journal->revenue }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                            {{ $journal->food_cost }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                            {{ $journal->labor_cost }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                            {{ $journal->profit }}
                                        </p>
                                    </td>
                                </tr>
                            @empty
                                <p>No record(s) found.</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
