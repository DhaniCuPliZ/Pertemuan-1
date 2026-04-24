<x-app-layout>
    <div class="container mx-auto px-4 py-12 max-w-7xl">
        <div class="premium-card">
            {{-- Header Section --}}
            <div class="p-8 border-b border-slate-700/50 flex flex-col sm:flex-row justify-between items-center gap-6 bg-slate-800/20">
                <div>
                    <h1 class="text-3xl font-extrabold text-white tracking-tight">
                        <span class="gradient-text">Product</span> Inventory
                    </h1>
                    <p class="text-slate-400 mt-2 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        Manage and track your products across all categories
                    </p>
                </div>

                @can('manage-product')
                    <x-add-product :url="route('product.create')" name="Product" />
                @endcan
            </div>

            {{-- Flash Message --}}
            @if (session('success'))
                <div class="mx-8 mt-6 p-4 bg-emerald-500/10 border border-emerald-500/20 rounded-2xl flex items-center gap-3 text-emerald-400">
                    <div class="p-1.5 rounded-lg bg-emerald-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <span class="font-medium text-sm">{{ session('success') }}</span>
                </div>
            @endif

            {{-- Table Section --}}
            <div class="overflow-x-auto">
                <table class="w-full text-left text-slate-300">
                    <thead class="bg-slate-900/40 text-xs uppercase tracking-widest text-slate-400 font-bold border-b border-slate-700/50">
                        <tr>
                            <th class="px-8 py-5">No</th>
                            <th class="px-8 py-5">Product Details</th>
                            <th class="px-8 py-5">Quantity</th>
                            <th class="px-8 py-5">Price</th>
                            <th class="px-8 py-5">Category</th>
                            <th class="px-8 py-5 text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-700/30">
                        @forelse ($products as $product)
                            <tr class="group hover:bg-white/5 transition-colors duration-200">
                                <td class="px-8 py-6">
                                    <span class="text-slate-500 font-mono text-sm">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                </td>

                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-2xl bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-400 group-hover:border-indigo-500/50 transition-colors shadow-inner">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-white font-bold group-hover:text-indigo-400 transition-colors">{{ $product->name }}</h3>
                                            <p class="text-xs text-slate-500 mt-0.5">Added by {{ $product->user->name ?? 'System' }}</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-2">
                                        <div class="px-3 py-1 rounded-full text-xs font-bold 
                                            {{ $product->qty > 10 
                                                ? 'bg-emerald-500/10 text-emerald-500 border border-emerald-500/20' 
                                                : 'bg-rose-500/10 text-rose-500 border border-rose-500/20' }}">
                                            {{ $product->qty }} Units
                                        </div>
                                    </div>
                                </td>

                                <td class="px-8 py-6 text-slate-200 font-mono text-sm">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </td>

                                <td class="px-8 py-6">
                                    <span class="px-3 py-1 rounded-lg bg-indigo-500/10 text-indigo-400 text-xs font-semibold border border-indigo-500/20">
                                        {{ $product->category->name ?? 'Uncategorized' }}
                                    </span>
                                </td>

                                <td class="px-8 py-6 text-right">
                                    <div class="flex justify-end items-center gap-3">
                                        {{-- View --}}
                                        <a href="{{ route('product.show', $product->id) }}"
                                           class="p-2.5 rounded-xl bg-slate-800 text-slate-400 hover:text-white hover:bg-indigo-600 transition-all duration-200 shadow-sm"
                                           title="View Details">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>

                                        {{-- Edit --}}
                                        @can('update', $product)
                                            <a href="{{ route('product.edit', $product) }}"
                                               class="p-2.5 rounded-xl bg-amber-500/10 text-amber-500 hover:bg-amber-500 hover:text-white transition-all duration-200 shadow-sm"
                                               title="Edit Product">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                        @endcan

                                        {{-- Delete --}}
                                        @can('delete', $product)
                                            <form action="{{ route('product.delete', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this product?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="p-2.5 rounded-xl bg-rose-500/10 text-rose-500 hover:bg-rose-500 hover:text-white transition-all duration-200 shadow-sm"
                                                        title="Delete Product">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-8 py-20 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="w-20 h-20 rounded-full bg-slate-800/50 flex items-center justify-center text-slate-500 mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                            </svg>
                                        </div>
                                        <h3 class="text-xl font-bold text-slate-300">Inventory Empty</h3>
                                        <p class="text-slate-500 mt-1">Start by adding your first product to the inventory.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($products->hasPages())
                <div class="p-8 border-t border-slate-700/50 bg-slate-900/20">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>