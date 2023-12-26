<x-layout.main 
    eyecatch="{{ url('/') }}{{ Storage::url($post->attachment->thumbnail) }}"
    twitter_card_type="summary_large_image"
>
    <x-slot:title>{{ $post->title }}</x-slot:title>
    <x-slot:description>{{ $post->description }}</x-slot:description>
    <div class="flex justify-center">
        <x-datail :post="$post" isModal="false"/>
    </div>
</x-layout.main>