@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Prijava {{ $participant->id }}</div>
                    <div class="panel-body">
  
                        <div class="row" style="margin: 0;">
                            <div class="col-md-12 text-center" style="background-color: #ff8989;">
                                <h2>
                                    @if ($glasano === null)
                                        PAŽNJA! Dobro se skoncentriši prilikom bodovanja jer se bodovi ne mogu mijenjati naknadno.
                                        <br/><br/>
                                    @elseif ($glasano !== null && $postojiPrijava !== null && $postojiPrijava->accepted != '1')
                                        Već si bodovao/la ovog participanta. Bodovi se ne mogu mijenjati.
                                        <br/><br/>
                                    @endif
                                    @if ($postojiPrijava !== null)
                                        <b><i>
                                        @if ($postojiPrijava->accepted == '1')
                                            Osoba je već prisustvovao/la na SSA '{{ date('y', strtotime($postojiPrijava->created_at)) }}
                                            <br/>
                                            Prijava je automatski odbijena ali i dalje je možeš pregledati ukoliko to želiš
                                        @else 
                                            Osoba je i prije aplicirala na SSA (zadnja aplikacija je bila {{ date('Y', strtotime($postojiPrijava->created_at)) }}. godine)
                                        @endif
                                        </i></b>
                                    @endif
                                </h2>
                            </div>
                        </div>
                        <br/>
                        <div class="table-responsive">
                            <form method="POST" action="{{ route('prijava.boduj', $participant->id) }}" id="form-bodovanje">
                                @if ($glasano === null)
                                    {{ csrf_field() }}
                                @endif
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td colspan="100%" style="text-align: center;"><h2>Osnovni podaci</h2></td>
                                        </tr>
                                        <tr>
                                            <th> Ime </th>
                                            <td colspan="2"> {{ $participant->ime }} </td>
                                        </tr>
                                        <tr>
                                            <th> Prezime </th>
                                            <td colspan="2"> {{ $participant->prezime }} </td>
                                        </tr>
                                        <tr>
                                            <th> Datum rođenja </th>
                                            <td colspan="2"> {{ $participant->datum_rodjenja }} </td>
                                        </tr>
                                        <tr>
                                            <th> Broj telefona </th>
                                            <td colspan="2"> {{ $participant->broj_telefona }} </td>
                                        </tr>
                                        <tr>
                                            <th> Email </th>
                                            <td colspan="2"> {{ $participant->email }} </td>
                                        </tr>
                                        <tr>
                                            <th> Veličina majice </th>
                                            <td colspan="2"> {{ $participant->velicina_majice }} </td>
                                        </tr>
                                        <tr>
                                            <th> Fakultet(i) </th>
                                            <td colspan="2"> 
                                                @foreach($participant->fakulteti as $fakultet)
                                                    {{ $fakultet->naziv . '; ' }}
                                                @endforeach
                                            </td>
                                        <tr>
                                            <td colspan="100%" style="text-align: center;"><h2>YAAY! Bodovanje :3 </h2></td>
                                        </tr>
                                        <tr>
                                            <th>Osobina</th><th>Vrijednost</th><th>Bodovi</th>
                                        </tr>
                                        <tr>
                                            <th>Engleski govor</th>
                                            <td>{{ $participant->engleski_govor }}</td>
                                            <td>Računa se srednja vrijednost govora i razumijevanja</td>
                                        </tr>
                                        <tr>
                                            <th>Engleski razumijevanje</th>
                                            <td>{{ $participant->engleski_razumijevanje }}</td>
                                            <td>
                                                <input type="hidden" name="engleski" 
                                                value="{{ ($participant->engleski_razumijevanje + $participant->engleski_govor) / 2 }}" />
                                                {{ ($participant->engleski_razumijevanje + $participant->engleski_govor) / 2 }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Motivaciono pismo</th>
                                            <td>{{ $participant->motivaciono }}</td>
                                            <td><input type="number" min="1" max="20" step="1" class="form-control" name="motivaciono" required /></td>
                                        </tr>
                                        <tr>
                                            <th>Ranije učešće na SSA</th>
                                            <td>{{ $participant->ranije_ucesce_na_ssa ? 'DA' : 'NE' }}</td>
                                            <td>Ako su učestvovali ranije automatski nisu prihvaćeni, nemoj se zamarati s ovim. Stoji tu kao info</td>
                                        </tr>
                                        <tr>
                                            <th>Kako ste saznali za SSA?</th>
                                                <td>{{ $participant->kako_ste_saznali }}</td>
                                                <td>Ne boduje se, stoji tu kao info</td>
                                            </th>
                                        </tr>   
                                        <tr>
                                            <th>Radno iskustvo</th>
                                            <td>{{ $participant->radno_iskustvo }}</td>
                                            <td>Stavka se veže za zaposlenje</td>
                                        </tr>
                                        <tr>
                                            <th>Trenutno zaposlenje</th>
                                            <td>{{ $participant->trenutno_zaposlenje ? 'DA' : 'NE' }}</td>
                                            <td><input type="number" min="-1" max="1" step="0.5" class="form-control" name="trenutno_zaposlenje" value="0" required /></td>
                                        </tr>
                                        <tr>
                                            <th>Ranije učešće na soft skills treninzima</th>
                                            <td>{{ $participant->ucesce_na_treninzima }}</td>
                                            <td><input type="number" step="1" class="form-control" name="ucesce_na_treninzima" required value="0" /></td>
                                        </tr>
                                        <tr>
                                            <th>Ranije učešće na ostalim seminarima</th>
                                            <td>{{ $participant->ucesce_na_seminarima }}</td>
                                            <td><input type="number" min="0" step="0.5" class="form-control" name="ucesce_na_seminarima" value="0" required /></td>
                                        </tr>
                                        <tr>
                                            <th>Iskustvo u NVO</th>
                                            <td>{{ $participant->nvo_iskustvo }}</td>
                                            <td><input type="number" min="0" step="1" class="form-control" name="nvo_iskustvo" required value="0" /></td>
                                        </tr>
                                        <tr>
                                            <th>Označi prijavu</th>
                                            <td>Pitaš se zašto? Postoji mogućnost da se kasnije budete razmišljali između nekoliko prijavljenih a ove zvjezdice vam omogućavaju da prijave označite interesantnim.
                                            </td>
                                            <td><input type="checkbox" name="asterix"></td>
                                        </tr>
                                        <tr>
                                            <th>Dodatne napomene</th>
                                            <td>{{ $participant->dodatne_napomene }}</td>
                                            <td>Ne boduje se, stoji ovdje kao info.</td>
                                        </tr>
                                    </tbody>
                                </table>
                                @if ($glasano === null)
                                    <div class="row" style="margin: 0;">
                                        <div class="col-md-4 col-md-offset-4">
                                            <button type="submit" class="btn btn-success btn-block">Spasi</button>
                                        </div>
                                    </div>
                                @endif
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
