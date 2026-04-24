<x-app-layout>
    <div class="container mx-auto px-4 py-12 max-w-4xl">
        <div class="premium-card">
            {{-- Header Section --}}
            <div class="p-10 border-b border-slate-700/50 bg-gradient-to-br from-indigo-600/20 to-purple-600/20 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-8 opacity-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-40 w-40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                
                <div class="relative z-10 flex flex-col md:flex-row items-center gap-8">
                    <div class="w-32 h-32 rounded-3xl bg-indigo-600 shadow-2xl shadow-indigo-600/40 flex items-center justify-center text-white text-5xl font-black border-4 border-slate-900">
                        {{ substr('Rafli Ramadhani Oktavianto Khufi', 0, 1) }}
                    </div>
                    <div class="text-center md:text-left">
                        <h2 class="text-indigo-400 font-bold tracking-widest uppercase text-xs mb-2">Student Profile</h2>
                        <h1 class="text-4xl font-black text-white tracking-tight">Rafli Ramadhani <span class="gradient-text">O. K.</span></h1>
                        <p class="text-slate-400 mt-2 font-medium">NIM: 20230140127 &bull; Teknik Informatika</p>
                    </div>
                </div>
            </div>

            {{-- Content Section --}}
            <div class="p-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    {{-- Biodata --}}
                    <div>
                        <h3 class="text-white font-bold text-lg mb-6 flex items-center gap-2">
                            <span class="w-8 h-1 bg-indigo-500 rounded-full"></span>
                            Biodata Mahasiswa
                        </h3>
                        <div class="space-y-6">
                            <div class="flex flex-col gap-1">
                                <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Nama Lengkap</span>
                                <span class="text-slate-200 font-semibold">Rafli Ramadhani Oktavianto Khufi</span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Nomor Induk Mahasiswa</span>
                                <span class="text-slate-200 font-semibold">20230140127</span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Program Studi</span>
                                <span class="text-slate-200 font-semibold text-indigo-400">Teknik Informatika</span>
                            </div>
                        </div>
                    </div>

                    {{-- Interests & Hobbies --}}
                    <div>
                        <h3 class="text-white font-bold text-lg mb-6 flex items-center gap-2">
                            <span class="w-8 h-1 bg-purple-500 rounded-full"></span>
                            Interests & Hobbies
                        </h3>
                        <div class="flex flex-wrap gap-3">
                            <span class="px-4 py-2 rounded-xl bg-slate-800 border border-slate-700 text-slate-300 text-sm font-medium">⚽ Futsal</span>
                            <span class="px-4 py-2 rounded-xl bg-slate-800 border border-slate-700 text-slate-300 text-sm font-medium">⛰️ Hiking</span>
                            <span class="px-4 py-2 rounded-xl bg-slate-800 border border-slate-700 text-slate-300 text-sm font-medium">💻 Web Development</span>
                            <span class="px-4 py-2 rounded-xl bg-slate-800 border border-slate-700 text-slate-300 text-sm font-medium">🎮 Gaming</span>
                        </div>

                        <div class="mt-10 p-6 rounded-2xl bg-indigo-500/5 border border-indigo-500/10">
                            <p class="text-slate-400 text-sm italic leading-relaxed">
                                "Technology is best when it brings people together and makes life simpler. Passionate about creating elegant web solutions."
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Footer Action --}}
            <div class="p-8 border-t border-slate-700/50 bg-slate-900/20 text-center">
                <a href="{{ route('dashboard') }}" class="text-indigo-400 hover:text-indigo-300 text-sm font-bold flex items-center justify-center gap-2 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7 7-7m8 14l-7-7 7-7" />
                    </svg>
                    Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</x-app-layout>