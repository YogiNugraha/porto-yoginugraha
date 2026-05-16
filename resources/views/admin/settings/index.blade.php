<x-admin-layout>
    <x-slot name="header">
        Website Settings
    </x-slot>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            @if(session('success'))
                <div class="mb-6 p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Brand & Logo -->
                <div class="mb-8 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4 border-b pb-2">Brand & Logo</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="logo_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Logo Text (Text Logo)</label>
                            <input type="text" id="logo_title" name="logo_title" value="{{ $settings['logo_title'] ?? '' }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Yogi Nugraha">
                        </div>
                        <div>
                            <x-file-upload 
                                id="logo" 
                                name="logo" 
                                label="Logo Image (Optional)"
                                :existingImage="$settings['logo'] ?? null"
                            />
                        </div>
                    </div>
                </div>

                <!-- Hero Section -->
                <div class="mb-8 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4 border-b pb-2">Hero Section (Home)</h3>
                    
                    <div class="mb-4">
                        <label for="hero_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hero Title</label>
                        <input type="text" id="hero_title" name="hero_title" value="{{ $settings['hero_title'] ?? '' }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Hi, I'm Yogi Nugraha">
                    </div>

                    <div class="mb-4">
                        <label for="hero_desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hero Description</label>
                        <textarea id="hero_desc" name="hero_desc" rows="4" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Full-Stack Web Developer...">{{ $settings['hero_desc'] ?? '' }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="hero_location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Location (e.g. Based in Kuningan, ID)</label>
                        <input type="text" id="hero_location" name="hero_location" value="{{ $settings['hero_location'] ?? '' }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    </div>

                    <div class="mb-6 p-4 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-white mb-4">Stats (Angka & Pencapaian)</h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="hero_stats_1_number" class="block mb-2 text-xs font-medium text-gray-900 dark:text-gray-300">Stat 1 Number</label>
                                <input type="text" id="hero_stats_1_number" name="hero_stats_1_number" value="{{ $settings['hero_stats_1_number'] ?? '10' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="10">
                            </div>
                            <div>
                                <label for="hero_stats_1_label" class="block mb-2 text-xs font-medium text-gray-900 dark:text-gray-300">Stat 1 Label</label>
                                <input type="text" id="hero_stats_1_label" name="hero_stats_1_label" value="{{ $settings['hero_stats_1_label'] ?? 'Web Apps Built' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Web Apps Built">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="hero_stats_2_number" class="block mb-2 text-xs font-medium text-gray-900 dark:text-gray-300">Stat 2 Number</label>
                                <input type="text" id="hero_stats_2_number" name="hero_stats_2_number" value="{{ $settings['hero_stats_2_number'] ?? '3' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="3">
                            </div>
                            <div>
                                <label for="hero_stats_2_label" class="block mb-2 text-xs font-medium text-gray-900 dark:text-gray-300">Stat 2 Label</label>
                                <input type="text" id="hero_stats_2_label" name="hero_stats_2_label" value="{{ $settings['hero_stats_2_label'] ?? 'System Integrations' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="System Integrations">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="hero_stats_3_number" class="block mb-2 text-xs font-medium text-gray-900 dark:text-gray-300">Stat 3 Number</label>
                                <input type="text" id="hero_stats_3_number" name="hero_stats_3_number" value="{{ $settings['hero_stats_3_number'] ?? '1' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="1">
                            </div>
                            <div>
                                <label for="hero_stats_3_label" class="block mb-2 text-xs font-medium text-gray-900 dark:text-gray-300">Stat 3 Label</label>
                                <input type="text" id="hero_stats_3_label" name="hero_stats_3_label" value="{{ $settings['hero_stats_3_label'] ?? 'Years Experience' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Years Experience">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                        <div>
                            <label for="btn_konsultasi_text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Consultation Button Text</label>
                            <input type="text" id="btn_konsultasi_text" name="btn_konsultasi_text" value="{{ $settings['btn_konsultasi_text'] ?? '' }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Mulai Konsultasi">
                        </div>
                        <div>
                            <label for="btn_konsultasi_link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Consultation Button Link</label>
                            <input type="text" id="btn_konsultasi_link" name="btn_konsultasi_link" value="{{ $settings['btn_konsultasi_link'] ?? '' }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="mailto:your@email.com atau wa.me/62...">
                        </div>
                    </div>

                    <div class="mb-4">
                        <x-file-upload 
                            id="hero_image" 
                            name="hero_image" 
                            label="Hero Profile Image"
                            :existingImage="$settings['hero_image'] ?? null"
                        />
                    </div>
                </div>

                <!-- Social Links -->
                <div class="mb-8 p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4 border-b pb-2">Social Links & Footer</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="linkedin_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">LinkedIn URL</label>
                            <input type="url" id="linkedin_url" name="linkedin_url" value="{{ $settings['linkedin_url'] ?? '' }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="https://linkedin.com/in/...">
                        </div>
                        <div>
                            <label for="github_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">GitHub URL</label>
                            <input type="url" id="github_url" name="github_url" value="{{ $settings['github_url'] ?? '' }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="https://github.com/...">
                        </div>
                        <div>
                            <label for="email_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email Address</label>
                            <input type="email" id="email_address" name="email_address" value="{{ $settings['email_address'] ?? '' }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="email@example.com">
                        </div>
                        <div>
                            <label for="footer_copyright" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Footer Copyright Text</label>
                            <input type="text" id="footer_copyright" name="footer_copyright" value="{{ $settings['footer_copyright'] ?? '' }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="© 2024 Yogi Nugraha. All rights reserved.">
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-8 py-3 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800 shadow-md">
                        Save All Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
