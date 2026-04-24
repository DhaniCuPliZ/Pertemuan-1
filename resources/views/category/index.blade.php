@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12 max-w-6xl">

    <div class="premium-card">
        {{-- Header Section --}}
        <div class="p-8 border-b border-slate-700/50 flex flex-col sm:flex-row justify-between items-center gap-6 bg-slate-800/20">
            <div>
                <h2 class="text-3xl font-extrabold text-white tracking-tight">
                    <span class="gradient-text">Category</span> Management
                </h2>
                <p class="text-slate-400 mt-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Organize and track your product categories efficiently
                </p>
            </div>

            <a href="{{ route('category.create') }}"
               class="premium-btn-primary flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Add Category
            </a>
        </div>

        {{-- Table Section --}}
        <div class="overflow-x-auto">
            <table class="w-full text-left text-slate-300">
                <thead class="bg-slate-900/40 text-xs uppercase tracking-widest text-slate-400 font-bold border-b border-slate-700/50">
                    <tr>
                        <th class="px-8 py-5">No</th>
                        <th class="px-8 py-5">Category Name</th>
                        <th class="px-8 py-5">Product Volume</th>
                        <th class="px-8 py-5 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-700/30">
                    @forelse ($categories as $category)
                    <tr class="group hover:bg-white/5 transition-colors duration-200">
                        <td class="px-8 py-6">
                            <span class="text-slate-500 font-mono text-sm">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        </td>

                        <td class="px-8 py-6">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-indigo-500/10 flex items-center justify-center text-indigo-400 group-hover:bg-indigo-500 group-hover:text-white transition-all duration-300">
                                    {{ substr($category->name, 0, 1) }}
                                </div>
                                <span class="text-white font-semibold group-hover:text-indigo-400 transition-colors">{{ $category->name }}</span>
                            </div>
                        </td>

                        <td class="px-8 py-6">
                            <div class="flex items-center gap-2">
                                <div class="h-2 w-2 rounded-full {{ $category->products->count() > 0 ? 'bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.5)]' : 'bg-slate-600' }}"></div>
                                <span class="font-medium">{{ $category->products->count() }} items</span>
                            </div>
                        </td>

                        <td class="px-8 py-6">
                            <div class="flex justify-center items-center gap-4">
                                <a href="{{ route('category.edit', $category->id) }}"
                                   class="p-2.5 rounded-xl bg-amber-500/10 text-amber-500 hover:bg-amber-500 hover:text-white transition-all duration-200 shadow-sm"
                                   title="Edit Category">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>

                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="p-2.5 rounded-xl bg-rose-500/10 text-rose-500 hover:bg-rose-500 hover:text-white transition-all duration-200 shadow-sm"
                                            onclick="return confirm('Are you sure you want to delete this category?')"
                                            title="Delete Category">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-8 py-20 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-20 h-20 rounded-full bg-slate-800/50 flex items-center justify-center text-slate-500 mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-slate-300">No Categories Found</h3>
                                <p class="text-slate-500 mt-1">Start by adding your first product category.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if(method_exists($categories, 'links') && $categories->hasPages())
        <div class="p-8 border-t border-slate-700/50 bg-slate-900/20">
            {{ $categories->links() }}
        </div>
        @endif
    </div>
</div>
@endsection