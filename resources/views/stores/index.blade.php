<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stores') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-1">
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Brand
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Store Number
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Address
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        TotalRevenue
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Total Profit
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($stores as $store)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap text-left">
                                                {{ $store->brand->name }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap text-center">
                                                {{ $store->number }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap text-left">
                                                {{ $store->address }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap text-center">
                                                {{ $store->journals_sum_revenue }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap text-center">
                                                {{ $store->journals_sum_profit }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <a href="{{ route('stores.show', ['store' => $store->id]) }}" class="text-gray-900 whitespace-no-wrap text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                  </svg>                                                  
                                            </a>
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
    </div>
</x-app-layout>
