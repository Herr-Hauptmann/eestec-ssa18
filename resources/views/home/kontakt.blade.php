@extends('layouts.home')
@section('content')
<div class="container-fluid kontaktAll">

    <div class="row">
        <div class="col-md-offset-1 col-md-4">
            <div>
                <form action="{{ route('posalji-mail') }}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">
                                    Ime i prezime</label>
                                <input type="text" class="form-control" id="name" name="ime"  value=""/>
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    Email*</label>
                                <input type="text" class="form-control " id="mail" name="mail" value=""/>
                                <p class="error"></p>
                            </div>
                            <div class="form-group">
                                <label for="name">
                                    Poruka*</label>
                                <textarea name="poruka" id="message" class="form-control " rows="7" cols="25"></textarea>
                                <p class="error"></p>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <button type="submit" name="send" class="btn btn-primary pull-right" id="btnContactUs">
                                Pošalji</button>
                        </div>
                    </div>
                </form>
            </div>
            <p class="confMessage"></p>
        </div>
        <div class="col-md-6 oo">
            <form>
                <legend><span class="glyphicon glyphicon-globe"></span> Organizacioni odbor</legend>

                <?php $prvi = $kontakti->first() ?>
                <div class="row">
                    @foreach ($kontakti as $kontakt)
                    <div class="col-md-6">
                        <address>
                            <strong>{{ $kontakt->ime . ' ' . $kontakt->prezime }}</strong><br>
                            {{ $kontakt->pozicija }}<br>
                            <label class="gr">{{ $kontakt->email }}<br>
                                <abbr title="Phone">
                                </abbr>
                                +387 61 894 696</label>
                        </address>

                    </div>

                    <!-- <div class="col-md-6">

                        <address>
                            <strong>Zlatan Peleksić</strong><br>
                            Koordinator tima za odnose sa javnošću<br>
                            <label class="gr">zlatan.peleksic@softskillsacademy.ba<br>
                                <abbr title="Phone">
                                </abbr>
                                +387 60 324 4129</label>
                        </address>
                    </div>


                    <div class="col-md-6">
                        <address>
                            <strong>Ana Vujanović</strong><br>
                            Koordinatorica tima za informacione tehnologije<br>
                            <label class="gr">ana.vujanovic@softskillsacademy.ba<br>
                                <abbr title="Phone">
                                </abbr>
                                +387 60 315 4143</label>
                        </address>



                    </div>


                    <div class="col-md-6">

                        <address>
                            <strong>Amila Hrustić</strong><br>
                            Koordinatorica tima za odnose sa kompanijama<br>
                            <label class="gr">amila.hrustic@softskillsacademy.ba<br>
                                <abbr title="Phone">
                                </abbr>
                                +387 61 045 749</label>
                        </address>

                    </div>


                    <div class="col-md-6">

                        <address>
                            <strong>Kerim Redžepagić</strong><br>
                            Koordinator tima za dizajn i publikacije<br>
                            <label class="gr">kerim.redzepagic@softskillsacademy.ba<br>
                                <abbr title="Phone">
                                </abbr>
                                +387 62 507 356</label>
                        </address>
                    </div>


                    <div class="col-md-6">
                        <address>
                            <strong>Enisa Musić</strong><br>
                            Koordinatorica tima za ljudske resurse i logistiku<br>
                            <label class="gr">enisa.music@softskillsacademy.ba<br>
                                <abbr title="Phone">
                                </abbr>
                                +387 62 969 560</label>
                        </address>

                    </div> -->
                    @endforeach
                </div>
            </form>
        </div>
    </div>
</div>
@endsection