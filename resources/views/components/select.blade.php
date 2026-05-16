@props(['name', 'id' => null, 'options' => [], 'selected' => null, 'required' => false])

<div x-data="{
        open: false,
        selectedOption: '{{ $selected ?? array_key_first($options) }}',
        options: {{ json_encode($options) }},
        get selectedLabel() {
            return this.options[this.selectedOption] || 'Select an option';
        },
        selectOption(value) {
            this.selectedOption = value;
            this.open = false;
            this.$refs.hiddenInput.dispatchEvent(new Event('change', { bubbles: true }));
        }
    }" 
    @click.away="open = false"
    class="relative w-full">
    
    <input type="hidden" name="{{ $name }}" id="{{ $id ?? $name }}" x-ref="hiddenInput" :value="selectedOption" {{ $required ? 'required' : '' }} {{ $attributes }}>
    
    <button type="button" 
        @click="open = !open"
        class="relative w-full text-left px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-slate-900 shadow-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
        <span x-text="selectedLabel" class="block truncate"></span>
        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
            <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
            </svg>
        </span>
    </button>

    <div x-show="open" 
        x-transition:leave="transition ease-in duration-100" 
        x-transition:leave-start="opacity-100" 
        x-transition:leave-end="opacity-0" 
        class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-lg py-1 text-sm ring-1 ring-slate-200 overflow-auto focus:outline-none" 
        style="display: none;">
        <ul role="listbox">
            <template x-for="(label, value) in options" :key="value">
                <li @click="selectOption(value)"
                    class="text-slate-900 cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-sky-500 hover:text-white transition-colors"
                    :class="{ 'bg-sky-50': selectedOption === value }">
                    <span x-text="label" class="block truncate" :class="{ 'font-semibold': selectedOption === value, 'font-normal': selectedOption !== value }"></span>
                    
                    <span x-show="selectedOption === value" class="text-sky-500 absolute inset-y-0 right-0 flex items-center pr-4">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </li>
            </template>
        </ul>
    </div>
</div>
