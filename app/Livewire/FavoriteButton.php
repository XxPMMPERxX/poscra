<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Favorite;

class FavoriteButton extends Component {

    public $post_id;
    public $isFavorite;
    public $favoriteCount;

    public function mount($post_id) {
        $this->post_id = $post_id;
        $this->isFavorite = Favorite::where('user_id', auth()->user()->id)
                        ->where('post_id', $post_id)
                        ->exists();
        $this->favoriteCount = Favorite::where('post_id', $post_id)->count();
    }

    public function onClick() {
        if ($this->isFavorite) {
            Favorite::where('user_id', auth()->user()->id)
                        ->where('post_id', $this->post_id)
                        ->delete();
        } else {
            $favorite = new Favorite;
            $favorite->user_id = auth()->user()->id;
            $favorite->post_id = $this->post_id;
            $favorite->save();
        }
        $this->isFavorite = Favorite::where('user_id', auth()->user()->id)
                        ->where('post_id', $this->post_id)
                        ->exists();
        $this->favoriteCount = Favorite::where('post_id', $this->post_id)->count();
    }
}