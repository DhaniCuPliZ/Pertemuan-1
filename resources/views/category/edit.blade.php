@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12 max-w-2xl">
    <div class="premium-card">
        {{-- Header Section --}}
        <div class="p-8 border-b border-slate-700/50 bg-slate-800/20">
            <div class="flex items-center gap-4">
                <a href="{{ route('category.index') }}" class="p-2 rounded-lg bg-slate-700/50 text-slate-400 hover:text-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <div>
                    <h2 class="text-2xl font-bold text-white tracking-tight">Edit <span class="gradient-text">Category</span></h2>
                    <p class="text-slate-400 text-sm mt-1">Update the details for "{{ $category->name }}"</p>
                </div>
            </div>
        </div>

        {{-- Form Section --}}
        <div class="p-8">
            <form action="{{ route('category.update', $category->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-sm font-semibold text-slate-300 mb-2 tracking-wide uppercase">Category Name</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500 group-focus-within:text-indigo-400 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h10M7 12h10m-8 5h8" />
                            </svg>
                        </div>
                        <input type="text" 
                               name="name" 
                               id="name"
                               value="{{ $category->name }}"
                               class="w-full pl-11 pr-4 py-3.5 bg-slate-900/50 border border-slate-700 rounded-2xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all duration-300"
                               required>
                    </div>
                    @error('name')
                        <p class="mt-2 text-sm text-rose-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4 flex flex-col sm:flex-row gap-4">
                    <button type="submit" class="premium-btn-primary flex-1 flex items-center justify-center gap-2 py-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Update Category
                    </button>
                    
                    <a href="{{ route('category.index') }}" class="premium-btn bg-slate-800 text-slate-300 hover:bg-slate-700 flex items-center justify-center py-4 px-8">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection