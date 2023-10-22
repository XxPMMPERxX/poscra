<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Attachment;

class DashboardController extends Controller {

    public function index() {
        $myposts = Post::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();

        return view('dashboard', ['myposts' => $myposts]);
    }
}