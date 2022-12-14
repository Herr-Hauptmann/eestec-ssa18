@extends('layouts.home')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p class="naslov" style="color: grey">Prijavi se - Budi korak ispred!</p>
                @if ($errors->any())
                    <p class="errorMessage">Neki podaci su neispravni ili nedostaju. Molimo provjerite SVE podatke</p>
                @elseif ($message = Session::get('success'))
                    <p class="confMessage">{{ $message }}</p>
                @endif
            </div>
        </div>

        <form name="prijavaForm" id="prijavaForm" method="post"
              action="{{ route('prijava.store') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
            <div class="row form-group">
                <div class="col-xs-12 col-md-4">
                    <ul class="nav nav-pills nav-stacked  thumbnail setup-panel koraci">
                        <li class="active"><a class="korak  @if ($errors->any()) korakError @endif" href="#step-1" id="korak1">
                                <h4 class="list-group-item-heading tekstKoraka ">Korak 1</h4>
                                <p class="list-group-item-text tekstKoraka">Osnovni podaci</p>
                            </a></li>
                        <li><a class="korak" href="#step-2" id="korak2">
                                <h4 class="list-group-item-heading tekstKoraka">Korak 2</h4>
                                <p class="list-group-item-text tekstKoraka">Podaci o obrazovanju</p>
                            </a></li>
                        <li><a class="korak" href="#step-3" id="korak3">
                                <h4 class="list-group-item-heading tekstKoraka">Korak 3</h4>
                                <p class="list-group-item-text tekstKoraka">Motivaciono pismo</p>
                            </a></li>
                        <li><a class="korak" href="#step-4" id="korak4">
                                <h4 class="list-group-item-heading tekstKoraka">Korak 4</h4>
                                <p class="list-group-item-text tekstKoraka">Prethodno iskustvo</p>
                            </a></li>
                        <li><a class="korak" href="#step-5" id="korak5">
                                <h4 class="list-group-item-heading tekstKoraka">Korak 5</h4>
                                <p class="list-group-item-text tekstKoraka">Dodatne napomene</p>
                            </a></li>
                        <li><a class="korak" href="#step-6" id="korak6">
                                <h4 class="list-group-item-heading tekstKoraka">Korak 6</h4>
                                <p class="list-group-item-text tekstKoraka">Slanje prijave</p>
                            </a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-8">


                    <div class="setup-content" id="step-1">
                        <div class="col-xs-12 well">
                            <!-- <p class="naslov1">Osnovni podaci</p>-->
                            <p class="napomena"><i>Napomena: Polja ozna??ena sa * su obavezna.</i></p>

                            <div class="form-group prvaForma col-xs-12 col-md-6">
                                <label for="ime">
                                    Ime*</label>
                                <input type="text" class="form-control" id="ime" name="ime" maxlength="30" autofocus value="{{ old('ime') }}" />
                                <p class="error" id="errorIme"></p>

                            </div>
                            <div class="form-group prvaForma col-xs-12 col-md-6">
                                <label for="prezime">
                                    Prezime*</label>
                                <input type="text" class="form-control" value="{{ old('prezime') }}" id="prezime" name="prezime" maxlength="30"/>
                                <p class="error" id="errorPrezime"></p>
                            </div>
                            <div class="form-group prvaForma col-xs-12 col-md-6">
                                <label for="datum">
                                    Datum ro??enja*</label>
                                <input type="date" class="form-control @if ($errors->has('datum')) {{ 'tbError' }} @endif" id="datum" name="datum" maxlength="15"  value="{{ old('datum') }}" />
                                <p class="error" id="errorDatum">
                                    @if ($errors->has('datum')) {{ 'Neispravan datum' }} @endif
                                </p>
                            </div>
                            <div class="form-group prvaForma col-xs-12 col-md-6">
                                <label for="telefon">
                                    Broj telefona*</label>
                                <input type="tel" value="{{ old('telefon') }}" class="form-control" id="telefon" name="telefon" maxlength="20"/>
                                {{--<input type="text" class="form-control" id="telefon" name="telefon" maxlength="20"/>--}}
                                <p class="error" id="errorTelefon"></p>
                            </div>
                            <div class="form-group prvaForma col-xs-12 col-md-6">
                                <label for="email">
                                    Email*</label>
                                <input type="text"  value="{{ old('email') }}" class="form-control" id="email" name="email"/>

                                <p class="error" id="errorEmail"></p>
                            </div>
                            <div class="form-group  prvaForma col-xs-12 col-md-6">
                                <label for="majica">
                                    Veli??ina majice*</label>
                                <a id="majicaLista" class=" listbox btn btn-info btn-select btn-select-light @if ($errors->any()) tbError @endif">
                                    <input type="hidden" value="{{ old('majica', 'S') }}" class="btn-select-input" id="majica" name="majica"/>
                                    <span class="btn-select-value">Izaberi</span>
                                    <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
                                    <ul class="selectLista">
                                        <li class="selected listItem">S</li>
                                        <li class="majica listItem">M</li>
                                        <li class="majica listItem">L</li>
                                        <li class="majica listItem">XL</li>
                                        <li class="majica listItem">XXL</li>
                                    </ul>
                                </a>
                                <p class="error" id="errorMajica">
                                    @if ($errors->any())
                                        Ponovite unos
                                    @endif
                                </p>
                            </div>


                            <a class="sljedeci btn pull-right">Sljede??i korak</a>


                            <!-- </form>-->

                        </div>

                    </div>


                    <div class="setup-content" id="step-2">
                        <div class="col-xs-12 well">

                            <label class="podnaslov podaciOFaxu">Podaci o fakultetu</label><br><br>

                            <div id="sviFaksovi">
                                <div id="addr0">

                                    <div class="form-group col-xs-12 col-md-9">
                                        <label for="fakultet">
                                            Fakultet*</label>
                                        <a class=" listbox btn btn-info btn-select btn-select-light @if ($errors->any()) tbError @endif">
                                            <input type="hidden" class="btn-select-input" id="fakultet0"
                                                   name="fakulteti[0][naziv]" value="0"/>
                                            <span class="btn-select-value">Izaberi</span>
                                            <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
                                            <ul class="selectLista">
                                                <li class="selected listItem">{{ $fakulteti->first()->naziv }}</li>
                                                @foreach($fakulteti->slice(1) as $fakultet)
                                                    <li class="listItem">{{ $fakultet->naziv }}</li>
                                                @endforeach
                                            </ul>
                                        </a>
                                        <p class="error" id="errorFakultet0"></p>
                                    </div>

                                    <div class="form-group col-xs-12 col-md-3">
                                        <label for="godinaStudija">
                                            Godina studija*</label>
                                        <a class=" listbox btn btn-info btn-select btn-select-light @if ($errors->any()) tbError @endif">
                                            <input type="hidden" class="btn-select-input" id="godina0" name="fakulteti[0][godina]"
                                                   value="1."/>
                                            <span class="btn-select-value">Izaberi</span>
                                            <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
                                            <ul class="selectLista">
                                                <li class="selected listItem">1.</li>
                                                <li class="listItem">2.</li>
                                                <li class="listItem">3.</li>
                                                <li class="listItem">4.</li>
                                                <li class="listItem">5.</li>
                                                <li class="listItem">6.</li>
                                            </ul>
                                        </a>
                                        <p class="error" id="errorGodina0"></p>
                                    </div>


                                    <div class="form-group col-xs-12 col-md-6 prviFaks">
                                        <label for="odsjek">
                                            Odsjek</label>
                                        <input type="text" class="form-control" id="odsjek0" name="fakulteti[0][odsjek]"/>
                                        <p class="error" id="errorOdsjek0"></p>
                                    </div>

                                </div>

                                

                            </div>


                            <div class="form-group col-xs-12">
                                <input type="button" value="Dodaj fakultet" class="btnSlanje col-xs-12  btn "
                                       id="add_row">
                            </div>


                            <div class="form-group col-xs-12 col-md-12">
                                <label class="podnaslov">Poznavanje engleskog jezika</label><br><br>


                            </div>

                            <div class="form-group col-xs-12 col-md-6">
                                <label for="govor">
                                    Govor*</label><br>

                                <div id="radioBtn1" class="btn-group">
                                    <a class="btn btn-primary btn-sm active" data-toggle="govor" data-title="1">1</a>
                                    <a class="btn btn-primary btn-sm notActive" data-toggle="govor" data-title="2">2</a>
                                    <a class="btn btn-primary btn-sm notActive" data-toggle="govor" data-title="3">3</a>
                                    <a class="btn btn-primary btn-sm notActive" data-toggle="govor" data-title="4">4</a>
                                    <a class="btn btn-primary btn-sm notActive" data-toggle="govor" data-title="5">5</a>

                                </div>
                                <p class="error" id="errorGovor"></p>
                                <input type="hidden" name="govor"  value="{{ old('govor', 1) }}"  id="govor">
                            </div>

                            <div class="form-group col-xs-12 col-md-6">
                                <label for="raz">
                                    Razumijevanje*</label><br>

                                <div id="radioBtn2" class="btn-group">
                                    <a class="btn btn-primary btn-sm active" data-toggle="raz" data-title="1">1</a>
                                    <a class="btn btn-primary btn-sm notActive" data-toggle="raz" data-title="2">2</a>
                                    <a class="btn btn-primary btn-sm notActive" data-toggle="raz" data-title="3">3</a>
                                    <a class="btn btn-primary btn-sm notActive" data-toggle="raz" data-title="4">4</a>
                                    <a class="btn btn-primary btn-sm notActive" data-toggle="raz" data-title="5">5</a>

                                </div>
                                <p class="error" id="errorRaz"></p>
                                <input type="hidden" value="{{ old('raz', 1) }}" name="raz" id="raz">
                            </div>


                            <a class="btn pull-left prethodni">Prethodni korak</a><a class="sljedeci btn pull-right">Sljede??i
                                korak</a>


                            <!-- </form>-->

                        </div>

                    </div>


                    <div class="setup-content" id="step-3">
                        <div class="col-xs-12 well">
                            <p class="napomena">Motivaciono pismo je klju??ni kriterij prilikom izbora kandidata za
                                radionicu. Preporu??ujemo vam da pa??ljivo napi??ete ??to bolje motivaciono pismo kako biste
                                imali ve??e ??anse za u??e????e na radionici.</p>

                            <div class="form-group col-xs-12">
                                <label for="pismo">
                                    Motivaciono pismo*</label>
                                <textarea name="pismo" id="pismo" class="form-control" rows="12" cols="25"
                                >{{ old('pismo') }}</textarea>
                                <p class="error" id="errorPismo"></p>
                            </div>


                            <a class="btn pull-left prethodni">Prethodni korak</a><a class="sljedeci btn pull-right">Sljede??i
                                korak</a>


                            <!-- </form>-->

                        </div>

                    </div>


                    <div class="setup-content" id="step-4">
                        <div class="col-xs-12 well">


                            <div class="form-group col-xs-12 col-md-4 margina">
                                <label for="ranijeUcesce">
                                    Ranije u??e????e na SSA*</label>
                                <a id="ranijeLista" class=" listbox btn btn-info btn-select btn-select-light">
                                    <input type="hidden" class="btn-select-input" id="ranije" name="ranije" value="{{ old('ranije', 'NE') }}"/>
                                    <span class="btn-select-value">Izaberi</span>
                                    <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
                                    <ul class="selectLista">
                                        <li class="selected listItem">NE</li>
                                        <li class="listItem">DA</li>
                                    </ul>
                                </a>
                                <p class="error" id="errorRanije"></p>
                            </div>

                            <div class="form-group col-xs-12 col-md-4 margina">
                                <label for="kakostesaznali">
                                    Kako ste saznali za SSA*</label>
                                <a class=" listbox btn btn-info btn-select btn-select-light">
                                    <input type="hidden" class="btn-select-input" id="kakostesaznali"
                                           name="kakostesaznali" value="{{ old('kakostesaznali', 'Promocija na fakultetu') }}"/>
                                    <span class="btn-select-value">Izaberi</span>
                                    <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
                                    <ul class="selectLista">
                                        <li class="selected listItem">Promocija na fakultetu</li>
                                        <li class="listItem">Dru??tvene mre??e</li>
                                        <li class="listItem">Mediji</li>
                                        <li class="listItem">Web stranica</li>
                                        <li class="listItem">Preporuka prijatelja</li>
                                        <li class="listItem">Promotivni leci i plakati</li>
                                        <li class="listItem">Ni??ta od navedenog</li>


                                    </ul>
                                </a>
                                <p class="error" id="errorKako"></p>
                            </div>

                            <div class="form-group col-xs-12">
                                <label for="radno">
                                    Radno iskustvo</label>
                                <textarea name="radno" id="radno" class="form-control" rows="9" cols="25"
                                >{{ old('radno') }}</textarea>
                                <p class="error" id="errorRadno"></p>
                            </div>


                            <div class="form-group col-xs-12 col-md-4 margina">
                                <label for="trenutno">
                                    Trenutno zaposlenje*</label>
                                <a class=" listbox btn btn-info btn-select btn-select-light">
                                    <input type="hidden" class="btn-select-input" id="trenutno" name="trenutno"
                                           value="{{ old('trenutno', 'NE') }}"/>
                                    <span class="btn-select-value">Izaberi</span>
                                    <span class='btn-select-arrow glyphicon glyphicon-chevron-down'></span>
                                    <ul class="selectLista">
                                        <li class="selected listItem">NE</li>
                                        <li class="listItem">DA</li>
                                    </ul>
                                </a>
                                <p class="error" id="errorTrenutno"></p>
                            </div>


                            <div class="form-group col-xs-12">
                                <label for="softUcesce">
                                    U??e????e na soft skills treninzima</label>
                                <textarea name="softUcesce" id="softUcesce" class="form-control" rows="9" cols="25"
                                >{{ old('softUcesce') }}</textarea>
                                <p class="error" id="errorUcesce"></p>
                            </div>


                            <div class="form-group col-xs-12">
                                <label for="seminari">
                                    U??e????e na seminarima</label>
                                <textarea name="seminari" id="seminari" class="form-control" rows="9" cols="25"
                                >{{ old('seminari') }}</textarea>
                                <p class="error" id="errorSeminari"></p>
                            </div>

                            <div class="form-group col-xs-12">
                                <label for="nvo">
                                    Iskustvo u NVO</label>
                                <textarea name="nvo" id="nvo" class="form-control" rows="9" cols="25"
                                >{{ old('nvo') }}</textarea>
                                <p class="error" id="errorNvo"></p>
                            </div>


                            <a class="btn pull-left prethodni">Prethodni korak</a><a class="sljedeci btn pull-right">Sljede??i
                                korak</a>


                            <!-- </form>-->

                        </div>

                    </div>


                    <div class="setup-content" id="step-5">
                        <div class="col-xs-12 well">
                            <p class="napomena">Ukoliko smatrate da postoji jo?? ne??to va??no ??to bismo trebali znati
                                iskoristite ovo polje kako biste nam to rekli.</p>

                            <div class="form-group col-xs-12">
                                <label for="pismo">
                                    Dodatne napomene</label>
                                <textarea name="dodatne" id="dodatne" class="form-control" rows="9" cols="25">{{ old('dodatne') }}</textarea>
                                <p class="error" id="errorDodatne"></p>
                            </div>


                            <a class="btn pull-left prethodni">Prethodni korak</a><a class="sljedeci btn pull-right">Sljede??i
                                korak</a>


                            <!-- </form>-->

                        </div>

                    </div>


                    <div class="setup-content" id="step-6">
                        <div class="col-xs-12 well">
                            <p class="napomena">Klikom na dugme Po??alji prijavu Va??a prijava ??e biti poslana. Molimo Vas
                                da prije slanja jo?? jednom provjerite da li ste ispravno popunili sve korake.</p>

                            <div class="form-group col-xs-12">
                                <input type="submit" name="prijavaSubmit" value="Po??alji prijavu"
                                       class="btnSlanje col-xs-12  btn">
                            </div>


                            <a class="btn pull-left prethodni">Prethodni korak</a>


                            <!-- </form>-->

                        </div>

                    </div>



                </div>
            </div>
        </form>
    </div>
@endsection