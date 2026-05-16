<x-layout>
    <x-slot:title>Yogi Nugraha</x-slot:title>

    <x-sections.hero :settings="$settings" />
    <x-sections.karya />
    <x-sections.tentang />
    <x-sections.ekosistem />
    <x-sections.blog :posts="$posts" />
    {{-- <x-sections.mitra /> --}}
    <x-sections.galeri :galleries="$galleries" />
    <x-sections.kontak />
</x-layout>
