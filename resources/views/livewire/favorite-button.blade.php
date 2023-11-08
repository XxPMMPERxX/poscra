<button 
    type="button" 
    class="
        btn
        w-full
        @auth
            @if($isFavorite) bg-myaccent hover:bg-myaccent/80 text-mywhite border-myaccent
            @else btn-outline border-myaccent hover:border-myaccent hover:bg-myaccent text-myaccent
            @endif font-yusei
        @endauth
    "
    @auth wire:click="onClick" @else disabled @endauth
>
    @auth
        @if ($isFavorite)
            お気に入り済み
        @else 
            お気に入り
        @endif
    @else
        お気に入り
    @endauth
    {{ $favoriteCount }}
</button>
