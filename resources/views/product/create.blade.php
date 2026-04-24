<x-app-layout>
    <div class="container mx-auto px-4 py-12 max-w-4xl">
        <div class="premium-card">
            {{-- Header Section --}}
            <div class="p-8 border-b border-slate-700/50 bg-slate-800/20">
                <div class="flex items-center gap-4">
                    <a href="{{ route('product.index') }}" class="p-2 rounded-lg bg-slate-700/50 text-slate-400 hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <div>
                        <h2 class="text-2xl font-bold text-white tracking-tight">Add New <span class="gradient-text">Product</span></h2>
                        <p class="text-slate-400 text-sm mt-1">Fill in the details to expand your inventory</p>
                    </div>
                </div>
            </div>

            {{-- Form Section --}}
            <div class="p-8">
                <form action="{{ route('product.store') }}" method="POST" class="space-y-8">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        {{-- Name --}}
                        <div class="md:col-span-2">
                            <label for="name" class="block text-sm font-semibold text-slate-300 mb-2 tracking-wide uppercase">Product Name</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500 group-focus-within:text-indigo-400 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                </div>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Enter product name..." class="w-full pl-11 pr-4 py-3.5 bg-slate-900/50 border border-slate-700 rounded-2xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all duration-300" required>
                            </div>
                            @error('name') <p class="mt-2 text-sm text-rose-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- Quantity --}}
                        <div>
                            <label for="quantity" class="block text-sm font-semibold text-slate-300 mb-2 tracking-wide uppercase">Quantity</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500 group-focus-within:text-indigo-400 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h10M7 12h10m-8 5h8" />
                                    </svg>
                                </div>
                                <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}" placeholder="0" class="w-full pl-11 pr-4 py-3.5 bg-slate-900/50 border border-slate-700 rounded-2xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all duration-300" required>
                            </div>
                            @error('quantity') <p class="mt-2 text-sm text-rose-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- Price --}}
                        <div>
                            <label for="price" class="block text-sm font-semibold text-slate-300 mb-2 tracking-wide uppercase">Price (IDR)</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500 group-focus-within:text-indigo-400 transition-colors">
                                    <span class="font-bold text-sm">Rp</span>
                                </div>
                                <input type="number" name="price" id="price" value="{{ old('price') }}" placeholder="0" class="w-full pl-11 pr-4 py-3.5 bg-slate-900/50 border border-slate-700 rounded-2xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all duration-300" required>
                            </div>
                            @error('price') <p class="mt-2 text-sm text-rose-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- Owner --}}
                        <div>
                            <label for="user_id" class="block text-sm font-semibold text-slate-300 mb-2 tracking-wide uppercase">Owner</label>
                            <div class="relative group">
                                <select name="user_id" id="user_id" class="w-full px-4 py-3.5 bg-slate-900/50 border border-slate-700 rounded-2xl text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all duration-300 appearance-none cursor-pointer" required>
                                    <option value="">Select Owner</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                            @error('user_id') <p class="mt-2 text-sm text-rose-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- Category --}}
                        <div>
                            <label for="category_id" class="block text-sm font-semibold text-slate-300 mb-2 tracking-wide uppercase">Category</label>
                            <div class="relative group">
                                <select name="category_id" id="category_id" class="w-full px-4 py-3.5 bg-slate-900/50 border border-slate-700 rounded-2xl text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all duration-300 appearance-none cursor-pointer" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                            @error('category_id') <p class="mt-2 text-sm text-rose-500">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="pt-6 flex flex-col sm:flex-row gap-4 border-t border-slate-700/50">
                        <button type="submit" class="premium-btn-primary flex-1 flex items-center justify-center gap-2 py-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Save Product
                        </button>
                        
                        <a href="{{ route('product.index') }}" class="premium-btn bg-slate-800 text-slate-300 hover:bg-slate-700 flex items-center justify-center py-4 px-8">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>