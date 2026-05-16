@props(['name', 'id' => null, 'required' => false, 'accept' => 'image/*', 'currentImage' => null, 'label' => null, 'existingImage' => null])

@php
    $imgSource = $existingImage ?? $currentImage;
@endphp

<div x-data="{ 
        isDropping: false, 
        fileName: '',
        previewUrl: '{{ $imgSource ? asset('storage/' . $imgSource) : '' }}',
        handleFileSelect(e) {
            const file = e.target.files[0];
            if (file) {
                this.fileName = file.name;
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = e => this.previewUrl = e.target.result;
                    reader.readAsDataURL(file);
                } else {
                    this.previewUrl = '';
                }
            }
        },
        handleDrop(e) {
            this.isDropping = false;
            const file = e.dataTransfer.files[0];
            if (file) {
                this.$refs.fileInput.files = e.dataTransfer.files;
                this.handleFileSelect({ target: this.$refs.fileInput });
            }
        }
    }" 
    class="w-full">

    @if($label)
        <label class="block mb-2 text-sm font-medium text-slate-700">{{ $label }}</label>
    @endif
    
    <div 
        @dragover.prevent="isDropping = true" 
        @dragleave.prevent="isDropping = false" 
        @drop.prevent="handleDrop($event)"
        :class="{ 'border-primary bg-sky-50': isDropping, 'border-slate-300': !isDropping }"
        class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed rounded-lg cursor-pointer bg-slate-50 hover:bg-slate-100 transition-colors relative overflow-hidden"
        @click="$refs.fileInput.click()">
        
        <input 
            x-ref="fileInput"
            type="file" 
            name="{{ $name }}" 
            id="{{ $id ?? $name }}" 
            class="hidden" 
            accept="{{ $accept }}"
            {{ $required ? 'required' : '' }}
            @change="handleFileSelect"
        >

        <template x-if="!previewUrl">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-8 h-8 mb-4 text-slate-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                </svg>
                <p class="mb-2 text-sm text-slate-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                <p class="text-xs text-slate-400">PNG, JPG, GIF up to 2MB</p>
                <p x-show="fileName" x-text="fileName" class="mt-2 text-sm font-medium text-sky-500"></p>
            </div>
        </template>

        <template x-if="previewUrl">
            <div class="absolute inset-0 w-full h-full flex flex-col items-center justify-center bg-black/50 opacity-0 hover:opacity-100 transition-opacity z-10">
                <p class="text-white text-sm font-semibold">Click or drop to change image</p>
            </div>
        </template>
        
        <template x-if="previewUrl">
            <img :src="previewUrl" class="absolute inset-0 w-full h-full object-cover rounded-lg" alt="Preview">
        </template>
    </div>
</div>
