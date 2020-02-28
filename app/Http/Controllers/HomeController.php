<?php

namespace App\Http\Controllers;

use App\Utility\StringUtility;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Post;
use App\Kontakt;
use App\Partner;
use App\Medium;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public $pr;
    public $glorg;

    public function __construct() {
        // Trenutno beskorisno, mozda se iskoristi kasnije za footer
        $this->pr = Kontakt::where('pozicija_short', 'PR')->first();
        $this->glorg = Kontakt::where('pozicija_short', 'GLORG')->first();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     * @throws \InvalidArgumentException
     */
    public function index()
    {
        /** @var LengthAwarePaginator $posts */
        $posts = Post::orderBy("created_at", 'desc')->paginate(config('ssa.home.landing.post_pagination', 4));

        $posts->each(function ($post) {
           $post->content = StringUtility::shortenString($post->content, 48);
           $post->title = StringUtility::shortenString($post->title, 17);

        });

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

        $generalni = Partner::where('category', 'generalni')->get();
        $obicni = Partner::where('category', 'obicni')->get();


        return view('home.index2020', compact('posts', 'albums', 'generalni', 'obicni'));
    }

    public function novosti() {

        /** @var LengthAwarePaginator $posts */
        $posts = Post::orderBy("created_at", 'desc')->paginate(config('ssa.posts.pagination', 10));

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
        $generalni = Medium::where('category', 'generalni')->get();
        $obicni = Medium::where('category', 'obicni')->get();
        return view('home.mediji', compact('generalni', 'obicni'));
    }

    public function partneri(Request $request)
    {
        $generalni = Partner::where('category', 'generalni')->get();
        $obicni = Partner::where('category', 'obicni')->get();
        return view('home.partneri', compact('generalni', 'obicni'));
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
