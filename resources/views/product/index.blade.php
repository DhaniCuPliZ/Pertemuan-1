<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4">

                    
                    {{-- Header --}}
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h1 class="text-2xl font-bold text-white tracking-tight">Product List</h1>
                            <p class="text-sm text-gray-400 mt-1">Manage your product inventory</p>
                        </div>

                        @can('manage-product')
                            <x-add-product :url="route('product.create')" name="Product" />
                        @endcan
                    </div>

                    {{-- Flash Message --}}
                    @if (session('success'))
                        <div class="mb-4 px-4 py-3 bg-green-600 text-white rounded-lg text-sm font-semibold">
                            ✅ {{ session('success') }}
                        </div>
                    @endif

                    {{-- Table --}}
                    <div class="overflow-x-auto rounded-xl border border-gray-600">
                        <table class="min-w-full divide-y divide-gray-600">

                            <thead class="bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider w-8">#</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Quantity</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Price</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Owner</th>
                                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-300 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="bg-gray-800 divide-y divide-gray-700">

                                @forelse ($products as $product)
                                    <tr class="hover:bg-gray-700 transition duration-100">

                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="px-4 py-4 text-sm font-semibold text-white">
                                            {{ $product->name }}
                                        </td>

                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold
                                                {{ $product->qty > 10
                                                ? 'bg-green-900 text-green-400'
                                                : 'bg-red-900 text-red-400' }}">
                                                {{ $product->qty }}
                                            </span>
                                        </td>

                                        <td class="px-6 py-4 text-sm text-gray-300 font-mono">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </td>

                                        <td class="px-6 py-4 text-sm text-gray-300">
                                            {{ $product->user->name ?? '-' }}
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-end gap-3">

                                                {{-- View --}}
                                                <a href="{{ route('product.show', $product->id) }}"
                                                   class="text-gray-400 hover:text-indigo-400 transition"
                                                   title="View">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                    </svg>
                                                </a>

                                                {{-- Edit --}}
                                                @can('update', $product)
                                                    <a href="{{ route('product.edit', $product) }}"
                                                       class="text-gray-400 hover:text-amber-400 transition"
                                                       title="Edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                        </svg>
                                                    </a>
                                                @endcan

                                                {{-- Delete --}}
                                                @can('delete', $product)
                                                    <form action="{{ route('product.delete', $product->id) }}"
                                                          method="POST"
                                                          onsubmit="return confirm('Yakin mau hapus produk ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-gray-400 hover:text-red-400 transition"
                                                            title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6M9 7h6"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endcan

                                            </div>
                                        </td>

                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-16 text-center text-gray-500 text-sm">
                                            Belum ada produk.
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    @if ($products->hasPages())
                        <div class="mt-4">
                            {{ $products->links() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>