<x-app-layout>
    <div class="container mx-auto px-4 py-12 max-w-4xl">
        <div class="premium-card">
            {{-- Header Section --}}
            <div class="p-8 border-b border-slate-700/50 bg-slate-800/20">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                    <div class="flex items-center gap-4">
                        <a href="{{ route('product.index') }}" class="p-2 rounded-lg bg-slate-700/50 text-slate-400 hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                        <div>
                            <h2 class="text-2xl font-bold text-white tracking-tight">Product <span class="gradient-text">Details</span></h2>
                            <p class="text-slate-400 text-sm mt-1">Viewing information for product #{{ $product->id }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <a href="{{ route('product.edit', $product) }}" class="premium-btn bg-amber-500/10 text-amber-500 border border-amber-500/20 hover:bg-amber-500 hover:text-white flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Delete this product permanently?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="premium-btn bg-rose-500/10 text-rose-500 border border-rose-500/20 hover:bg-rose-500 hover:text-white flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6M9 7h1m-1 0a1 1 0 00-1-1H9a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Info Content --}}
            <div class="p-0">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    {{-- Left Column: Main Info --}}
                    <div class="p-10 border-b md:border-b-0 md:border-r border-slate-700/50 space-y-8">
                        <div>
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-widest block mb-2">Product Name</span>
                            <h3 class="text-3xl font-black text-white tracking-tight">{{ $product->name }}</h3>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div class="p-4 rounded-2xl bg-slate-900/50 border border-slate-700">
                                <span class="text-xs font-bold text-slate-500 uppercase tracking-widest block mb-1">Quantity</span>
                                <div class="flex items-center gap-2">
                                    <span class="text-2xl font-bold {{ $product->qty > 10 ? 'text-emerald-400' : 'text-rose-400' }}">{{ $product->qty }}</span>
                                    <span class="text-xs text-slate-500 font-medium">Units</span>
                                </div>
                            </div>
                            <div class="p-4 rounded-2xl bg-slate-900/50 border border-slate-700">
                                <span class="text-xs font-bold text-slate-500 uppercase tracking-widest block mb-1">Price</span>
                                <div class="flex items-center gap-1">
                                    <span class="text-xs text-slate-500 font-bold">Rp</span>
                                    <span class="text-xl font-bold text-indigo-400">{{ number_format($product->price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 rounded-2xl bg-indigo-500/5 border border-indigo-500/10 flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-indigo-600 flex items-center justify-center text-white text-xl font-bold shadow-lg shadow-indigo-600/20">
                                {{ substr($product->category->name ?? '?', 0, 1) }}
                            </div>
                            <div>
                                <span class="text-xs font-bold text-slate-500 uppercase tracking-widest block">Category</span>
                                <span class="text-slate-200 font-semibold">{{ $product->category->name ?? 'Uncategorized' }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Right Column: Meta Info --}}
                    <div class="p-10 bg-slate-900/30 space-y-8">
                        <div>
                            <h4 class="text-white font-bold text-sm mb-4 uppercase tracking-widest">Ownership & History</h4>
                            <div class="space-y-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="text-xs text-slate-500 block">Assigned Owner</span>
                                        <span class="text-sm text-slate-200 font-medium">{{ $product->user->name ?? 'Unknown' }}</span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 00-2 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="text-xs text-slate-500 block">Created On</span>
                                        <span class="text-sm text-slate-200 font-medium">{{ $product->created_at->format('M d, Y | H:i') }}</span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="text-xs text-slate-500 block">Last Updated</span>
                                        <span class="text-sm text-slate-200 font-medium">{{ $product->updated_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6 border-t border-slate-700/50">
                            <div class="p-4 rounded-xl bg-rose-500/5 border border-rose-500/10 text-center">
                                <p class="text-xs text-slate-500 font-medium italic">
                                    "Changes to this product will be logged in the system history."
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>