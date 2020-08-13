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
        // $this->pr = Kontakt::where('pozicija_short', 'PR')->first();
        // $this->glorg = Kontakt::where('pozicija_short', 'GLORG')->first();
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
        // $posts = Post::orderBy("created_at", 'desc')->paginate(config('ssa.posts.pagination', 10));
        $posts = Post::orderBy("created_at", 'desc')->get();

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

        $kontakti=Kontakt::all();

        $generalniMedij = Medium::where('category', 'generalni')->get();
        $obicniMedij = Medium::where('category', 'obicni')->get();

        return view('home.index2020', compact('posts', 'albums', 'generalni', 'obicni', 'kontakti', 'generalniMedij', 'obicniMedij'));
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

    public function sendMail(Request $request)
    {

        $request->validate([
            'ime' => 'required|min:3',
            'email' => 'required|email',
            'poruka' => 'required'
        ]);

        $kontakti = Kontakt::all();

        if ($kontakti->isEmpty()) {

            $primi = 'info@softskillsacademy.ba';

            $subject = '[SSA] Kontakt forma';
            $eol = PHP_EOL;

            $message = '<html><body>';
            $message .= 'Od '.$request->ime.'<br />';
            $message .= 'Email: '.$request->email.'<br /><br />';
            $message .= $request->poruka;
            $message .= '</body></html>';

            $headers = 'From: Soft Skills Academy Sarajevo <noreply@softskillsacademy.ba> ' . "\r\n" .
                            'Reply-To: softskillsacademy.ba <noreply@softskillsacademy.ba>' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=\"UTF-8\"".$eol;
            $headers .= "Content-Transfer-Encoding: 8bit".$eol.$eol;

            
            mail($primi, $subject, $message, $headers);
        } else {
            foreach ($kontakti as $kontakt) {
                $kontakt->notify(new KontaktFormaEmail($request->ime, $request->email, $request->poruka));
            }
        }

        return back()->with('success', 'Hvala što ste nas kontaktirali. Naš tim će nastojati da u što kraćem roku odgovori na Vašu poruku.');
    }

}
