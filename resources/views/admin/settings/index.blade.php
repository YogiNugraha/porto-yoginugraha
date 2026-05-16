<x-admin-layout>
    <x-slot name="header">Website Settings</x-slot>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="p-6">
            @if(session('success'))
                <div class="mb-6 p-4 text-sm text-green-800 rounded-lg bg-green-50 border border-green-200">{{ session('success') }}</div>
            @endif

            <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Brand & Logo -->
                <div class="mb-8 p-5 bg-slate-50 rounded-lg border border-slate-200">
                    <h3 class="text-lg font-medium text-slate-900 mb-4 border-b border-slate-200 pb-2">Brand & Logo</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="logo_title" class="block mb-2 text-sm font-medium text-slate-700">Logo Text (Text Logo)</label>
                            <input type="text" id="logo_title" name="logo_title" value="{{ $settings['logo_title'] ?? '' }}" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" placeholder="Yogi Nugraha">
                        </div>
                        <div>
                            <x-file-upload id="logo" name="logo" label="Logo Image (Optional)" :existingImage="$settings['logo'] ?? null" />
                        </div>
                    </div>
                </div>

                <!-- Hero Section -->
                <div class="mb-8 p-5 bg-slate-50 rounded-lg border border-slate-200">
                    <h3 class="text-lg font-medium text-slate-900 mb-4 border-b border-slate-200 pb-2">Hero Section (Home)</h3>
                    
                    <div class="mb-4">
                        <label for="hero_title" class="block mb-2 text-sm font-medium text-slate-700">Hero Title</label>
                        <input type="text" id="hero_title" name="hero_title" value="{{ $settings['hero_title'] ?? '' }}" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" placeholder="Hi, I'm Yogi Nugraha">
                    </div>

                    <div class="mb-4">
                        <label for="hero_desc" class="block mb-2 text-sm font-medium text-slate-700">Hero Description</label>
                        <textarea id="hero_desc" name="hero_desc" rows="4" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" placeholder="Full-Stack Web Developer...">{{ $settings['hero_desc'] ?? '' }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="hero_location" class="block mb-2 text-sm font-medium text-slate-700">Location (e.g. Based in Kuningan, ID)</label>
                        <input type="text" id="hero_location" name="hero_location" value="{{ $settings['hero_location'] ?? '' }}" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                    </div>

                    <div class="mb-5 p-4 bg-white rounded-lg border border-slate-200">
                        <h4 class="text-sm font-semibold text-slate-900 mb-4">Stats (Angka & Pencapaian)</h4>
                        
                        @for($i = 1; $i <= 3; $i++)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 {{ $i < 3 ? 'mb-4' : '' }}">
                            <div>
                                <label for="hero_stats_{{ $i }}_number" class="block mb-2 text-xs font-medium text-slate-700">Stat {{ $i }} Number</label>
                                <input type="text" id="hero_stats_{{ $i }}_number" name="hero_stats_{{ $i }}_number" value="{{ $settings['hero_stats_'.$i.'_number'] ?? '' }}" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                            </div>
                            <div>
                                <label for="hero_stats_{{ $i }}_label" class="block mb-2 text-xs font-medium text-slate-700">Stat {{ $i }} Label</label>
                                <input type="text" id="hero_stats_{{ $i }}_label" name="hero_stats_{{ $i }}_label" value="{{ $settings['hero_stats_'.$i.'_label'] ?? '' }}" class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                            </div>
                        </div>
                        @endfor
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-4">
                        <div>
                            <label for="btn_konsultasi_text" class="block mb-2 text-sm font-medium text-slate-700">Consultation Button Text</label>
                            <input type="text" id="btn_konsultasi_text" name="btn_konsultasi_text" value="{{ $settings['btn_konsultasi_text'] ?? '' }}" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" placeholder="Mulai Konsultasi">
                        </div>
                        <div>
                            <label for="btn_konsultasi_link" class="block mb-2 text-sm font-medium text-slate-700">Consultation Button Link</label>
                            <input type="text" id="btn_konsultasi_link" name="btn_konsultasi_link" value="{{ $settings['btn_konsultasi_link'] ?? '' }}" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" placeholder="mailto:your@email.com atau wa.me/62...">
                        </div>
                    </div>

                    <div class="mb-4">
                        <x-file-upload id="hero_image" name="hero_image" label="Hero Profile Image" :existingImage="$settings['hero_image'] ?? null" />
                    </div>
                </div>

                <!-- Social Links -->
                <div class="mb-8 p-5 bg-slate-50 rounded-lg border border-slate-200">
                    <h3 class="text-lg font-medium text-slate-900 mb-4 border-b border-slate-200 pb-2">Social Links & Footer</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="linkedin_url" class="block mb-2 text-sm font-medium text-slate-700">LinkedIn URL</label>
                            <input type="url" id="linkedin_url" name="linkedin_url" value="{{ $settings['linkedin_url'] ?? '' }}" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" placeholder="https://linkedin.com/in/...">
                        </div>
                        <div>
                            <label for="github_url" class="block mb-2 text-sm font-medium text-slate-700">GitHub URL</label>
                            <input type="url" id="github_url" name="github_url" value="{{ $settings['github_url'] ?? '' }}" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" placeholder="https://github.com/...">
                        </div>
                        <div>
                            <label for="email_address" class="block mb-2 text-sm font-medium text-slate-700">Email Address</label>
                            <input type="email" id="email_address" name="email_address" value="{{ $settings['email_address'] ?? '' }}" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" placeholder="email@example.com">
                        </div>
                        <div>
                            <label for="footer_copyright" class="block mb-2 text-sm font-medium text-slate-700">Footer Copyright Text</label>
                            <input type="text" id="footer_copyright" name="footer_copyright" value="{{ $settings['footer_copyright'] ?? '' }}" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" placeholder="© 2024 Yogi Nugraha. All rights reserved.">
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <button type="submit" class="px-8 py-3 bg-sky-500 text-white text-sm font-medium rounded-lg hover:bg-sky-600 transition-colors shadow-sm">Save All Settings</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
