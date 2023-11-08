<?php
namespace App\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostModalProvider {

    protected $posts = [];
    protected $prefix;

    public function __construct($prefix = "")
    {
        $this->prefix = $prefix;
    }

    public function registerBulk(array|Collection $posts) {
        foreach ($posts as $post) {
            $this->register($post);
        }
    }

    public function register(Post $post) {
        if (isset($this->posts[$post->id])) return;
        $modal_id = $this->prefix . str_replace('-', '_', $post->id);
        $this->posts[$post->id] = [
            'modal_id' => $modal_id,
            'post' => $post
        ];
    }

    public function getModalId(Post $post) {
        if (!isset($this->posts[$post->id])) {
            return null;
        }

        return $this->posts[$post->id]['modal_id'];
    }

    public function getModalList() {
        return $this->posts;
    }

}