<x-layout.main eyecatch="{{ url('/') }}{{ Storage::url($post->attachment->thumbnail) }}">
    <x-slot:title>{{ $post->title }}</x-slot:title>
    <x-slot:description>{{ $post->description }}</x-slot:description>
    <div class="flex justify-center">
        <x-datail :post="$post" isModal="false"/>
    </div>
</x-layout.main>