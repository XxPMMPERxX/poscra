<button type="button" class="btn @if($isFavorite) bg-myaccent hover:bg-myaccent/80 text-mywhite @else btn-outline border-myaccent hover:border-myaccent hover:bg-myaccent text-myaccent @endif font-yusei" wire:click="onClick">
    @if ($isFavorite)
        お気に入り済み
    @else 
        お気に入り
    @endif
    {{ $favoriteCount }}
</button>