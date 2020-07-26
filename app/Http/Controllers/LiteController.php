<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Utility\StringUtility;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use PDO;

class LiteController extends Controller
{
    public function lite()
    {
        /** @var array $dirs */
        $dirs = Storage::disk('public')->directories('img/galerija');


        $albums = [];

        foreach ($dirs as $dir) {
            $name = explode('/', $dir)[2];
            $files = Storage::disk('public')->allFiles($dir);
            if (! empty($files)) {
                // Mozda prvo provjeriti da li postoji
                $albums[$name] = $dir . '/cover.jpg';
            }
        }

        $posts = Post::orderBy("created_at", 'desc')->get();

        $posts->each(function ($post) {
            $post->content = StringUtility::shortenString($post->content, 48);
            $post->title = StringUtility::shortenString($post->title, 17);

        });

        return view('lite/lite-home', compact('albums', 'posts'));
    }
    public function otvoriLite()
    {
        
    }
    public function zatvoriLite()
    {
        
    }
}
