<x-layout.main>
    <x-slot:title>{{ $post->title }}</x-slot:title>
    <div class="flex justify-center">
        <x-datail :post="$post" isModal="false"/>
    </div>
</x-layout.main>