<x-app-layout>
    <div class="container mx-auto px-4 py-12 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Welcome Card --}}
            <div class="lg:col-span-2 premium-card p-10 flex flex-col justify-between relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:scale-110 transition-transform duration-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-40 w-40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                
                <div class="relative z-10">
                    <h2 class="text-indigo-400 font-bold tracking-widest uppercase text-xs mb-4">Welcome back,</h2>
                    <h1 class="text-4xl font-black text-white tracking-tight mb-4">
                        Hello, <span class="gradient-text">{{ Auth::user()->name }}</span>!
                    </h1>
                    <p class="text-slate-400 max-w-md leading-relaxed">
                        You're currently logged in as an <span class="text-indigo-400 font-bold">{{ strtoupper(Auth::user()->role) }}</span>. 
                        Manage your inventory, track categories, and oversee system operations from this central portal.
                    </p>
                </div>

                <div class="mt-12 flex gap-4 relative z-10">
                    <a href="{{ route('product.index') }}" class="premium-btn-primary">
                        View Inventory
                    </a>
                    <a href="{{ route('profile.edit') }}" class="premium-btn bg-slate-800 text-slate-300 hover:bg-slate-700">
                        Edit Profile
                    </a>
                </div>
            </div>

            {{-- Status Card --}}
            <div class="premium-card p-8 bg-gradient-to-br from-indigo-600/20 to-purple-600/20 border-indigo-500/20">
                <h3 class="text-white font-bold text-lg mb-6">System Status</h3>
                <div class="space-y-6">
                    <div class="flex items-center justify-between p-4 rounded-2xl bg-slate-900/50 border border-slate-800">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.5)]"></div>
                            <span class="text-sm font-medium text-slate-300">Database</span>
                        </div>
                        <span class="text-xs font-bold text-emerald-400 uppercase">Online</span>
                    </div>
                    <div class="flex items-center justify-between p-4 rounded-2xl bg-slate-900/50 border border-slate-800">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.5)]"></div>
                            <span class="text-sm font-medium text-slate-300">Storage</span>
                        </div>
                        <span class="text-xs font-bold text-emerald-400 uppercase">Optimal</span>
                    </div>
                    <div class="flex items-center justify-between p-4 rounded-2xl bg-slate-900/50 border border-slate-800">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-indigo-500 shadow-[0_0_8px_rgba(79,70,229,0.5)]"></div>
                            <span class="text-sm font-medium text-slate-300">Role</span>
                        </div>
                        <span class="text-xs font-bold text-indigo-400 uppercase">{{ Auth::user()->role }}</span>
                    </div>
                </div>
                
                <div class="mt-8 p-4 rounded-2xl bg-white/5 border border-white/10 text-center">
                    <p class="text-xs text-slate-500 uppercase tracking-widest font-bold">Last Login</p>
                    <p class="text-sm text-slate-300 mt-1 font-mono">{{ now()->format('D, d M Y | H:i') }}</p>
                </div>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="premium-card p-6 hover:-translate-y-1 transition-transform group">
                <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 text-indigo-400 flex items-center justify-center mb-4 group-hover:bg-indigo-600 group-hover:text-white transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <h4 class="text-white font-bold mb-1">New Product</h4>
                <p class="text-xs text-slate-500">Add items to inventory</p>
                <a href="{{ route('product.create') }}" class="absolute inset-0"></a>
            </div>
            
            @can('view-category')
            <div class="premium-card p-6 hover:-translate-y-1 transition-transform group">
                <div class="w-12 h-12 rounded-2xl bg-purple-500/10 text-purple-400 flex items-center justify-center mb-4 group-hover:bg-purple-600 group-hover:text-white transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <h4 class="text-white font-bold mb-1">Categories</h4>
                <p class="text-xs text-slate-500">Manage grouping</p>
                <a href="{{ route('category.index') }}" class="absolute inset-0"></a>
            </div>
            @endcan

            <div class="premium-card p-6 hover:-translate-y-1 transition-transform group">
                <div class="w-12 h-12 rounded-2xl bg-amber-500/10 text-amber-400 flex items-center justify-center mb-4 group-hover:bg-amber-600 group-hover:text-white transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h4 class="text-white font-bold mb-1">Help Center</h4>
                <p class="text-xs text-slate-500">Documentation & guides</p>
                <a href="{{ route('about') }}" class="absolute inset-0"></a>
            </div>

            <div class="premium-card p-6 hover:-translate-y-1 transition-transform group">
                <div class="w-12 h-12 rounded-2xl bg-rose-500/10 text-rose-400 flex items-center justify-center mb-4 group-hover:bg-rose-600 group-hover:text-white transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <h4 class="text-white font-bold mb-1">My Account</h4>
                <p class="text-xs text-slate-500">Update settings</p>
                <a href="{{ route('profile.edit') }}" class="absolute inset-0"></a>
            </div>
        </div>
    </div>
</x-app-layout>