<?php

namespace App\Http\Controllers;

use App\Participant;
use App\Faculty;
use App\Point;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Notifications\PrijavaUspjesna;
use Carbon\Carbon;

use Illuminate\Http\Request;

class NoviController extends Controller
{
    public function index()
    {
        $participants = Participant::whereBetween('created_at', array('2020-01-01', '2021-12-31'))
                            ->where('ime', 'not like', '%test%')
                            ->groupby('motivaciono')
                            ->orderby('id')
                            ->get();
        foreach ($participants as $key => $participant) {
            $godina = DB::table('fakultet_participant')->where('participant_id', $participant->id)->first()->godina;
            $participant->godina = $godina;
        }
        return view('godine.index', compact('participants'));
    }
}
