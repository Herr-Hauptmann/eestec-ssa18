<?php

namespace App\Http\Controllers;

use App\Utility\StringUtility;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Post;
use App\Kontakt;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     * @throws \InvalidArgumentException
     */
    public function index()
    {

        /** @var LengthAwarePaginator $posts */
        $posts = Post::paginate(config('ssa.home.landing.post_pagination', 3));

        $posts->each(function ($post) {
           $post->content = StringUtility::shortenString($post->content, 48);
           $post->title = StringUtility::shortenString($post->title, 17);

        });

        return view('home.index', compact('posts'));
    }

    public function novosti() {

        /** @var LengthAwarePaginator $posts */
        $posts = Post::paginate(config('ssa.home.landing.post_pagination', 3));

        $posts->each(function ($post) {
            $post->content = StringUtility::shortenString($post->content, 48);
            $post->title = StringUtility::shortenString($post->title, 17);

        });
        return view('home.novosti', compact('posts'));
    }

    public function jednaNovost(Post $post) {
        return view('posts.show', compact('post'));
    }

    public function treninziITreneri(Request $request)
    {
        return view('home.treninzi');
    }

    public function mediji(Request $request)
    {
        return view('home.mediji');
    }

    public function partneri(Request $request)
    {
        return view('home.partneri');
    }

    public function galerija(Request $request)
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

        return view('home.galerija', compact('albums'));
    }

    public function album($album)
    {
        $albums = [];

        /** @var array $dirs */
        $dirs = Storage::disk('public')->directories('img/galerija/' . $album);

        foreach ($dirs as $dir) {
            $name = explode('/', $dir)[3];
            $files = Storage::disk('public')->allFiles($dir);
            if (! empty($files)) {
                // Mozda prvo provjeriti da li postoji
                $albums[$name] = $dir . '/cover.jpg';
//                dd($files);
            }
        }

        $godina = $album;
        return view('home.katalog', compact('albums', 'godina'));
    }

    public function dan($album, $dan)
    {

        /** @var array $images */
        $images = Storage::disk('public')->allFiles('img/galerija/' . $album . '/' . $dan);

        return view('home.album', compact('images', 'dan'));
    }

    public function kontakt(Request $request)
    { 
        
      $kontakti=Kontakt::all();
        return view('home.kontakt',compact('kontakti'));
    }

}
