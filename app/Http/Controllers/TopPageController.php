<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Attachment;

class TopPageController extends Controller {

    public function index() {
        $posts = Post::orderBy('updated_at', 'desc')->get();

        return view('welcome', ['posts' => $posts]);
    }
}