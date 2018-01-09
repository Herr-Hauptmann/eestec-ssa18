<?php

namespace App\Http\Controllers;

use DirectoryIterator;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 3;
        $posts = Post::paginate($perPage);
        return view('home.index', compact('posts'));
    }

    public function novosti() {
        $perPage = 6;
        $posts = Post::paginate($perPage);
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
        return view('home.kontakt');
    }

}
