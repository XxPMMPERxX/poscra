<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Attachment;
use App\Models\Favorite;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TopPageController extends Controller {

    public function index() {
        $posts = Post::orderBy('updated_at', 'desc')->get();
        $trend_posts = DB::table('favorites')
                        ->select(DB::raw('count(*) as favorites_count, post_id'))
                        ->whereDate('created_at', '>=', Carbon::today()->subDay(7)) // 一週間で集計
                        ->groupBy('post_id')
                        ->orderBy('favorites_count')
                        ->limit(4)
                        ->get()
                        ->map(function($item, $key){
                            return Post::find($item->post_id);
                        });
        $new_posts = Post::orderBy('created_at', 'desc')->limit(4)->get();

        return view(
            'welcome', 
            [
                'posts' => $posts,
                'trend_posts' => $trend_posts,
                'new_posts' => $new_posts
            ]
        );
    }
}