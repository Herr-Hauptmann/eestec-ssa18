<!-- Modal -->
@extends('layouts.participants')
@section('content')
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
  </form>
          {!! Form::model($participant, ['route' => 'participant.update', 'id' => 'edit-profile_form', 'files' => true, 'method' => 'PUT']) !!}
            <input type="hidden" value="PUT" name="_method">
            <div class="row">
              <div class="col-md-4 col-xs-12">
                <div class="row">
                  <div class="col-md-12 col-md-offset-0 col-sm-offset-3 col-xs-8 col-xs-offset-2 col-sm-6 match-height">
                    <div class="profile-img" style="background-image: url({{ asset($participant->slika ?? 'img/profile-placeholder.png') }}); margin-bottom: 20px;">
                    </div>
                  </div>
                  <div class="col-md-12 col-md-offset-0 col-sm-offset-3 col-xs-8 col-xs-offset-2 col-sm-6 match-height flex-center">
                    <div class="upload-btn-wrapper">

                      <button class="btn btn-large btn-green btn-block btn-radius btn-upload">
                        <i class="fas fa-upload"></i> Upload
                      </button>
                      <input type="file" name="slika" class="file-upload" />
                    </div>
                    <span class="lead file-text" style="display: none;"></span>
                    <a class="btn btn-large btn-gray_fill btn-block btn-radius" href="{{ route('logout') }}" 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xs-12">
                <div class="form-group row">
                  <div class="col-xs-4 text-right">
                    <label for="ime_i_prezime">Ime:</label>
                  </div>
                  <div class="col-xs-8">
                    <input type="text" class="cool-input" name="ime" id="ime" value="{{ old('ime_i_prezime') ?? $participant->ime  }}" required/>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-4 text-right">
                    <label for="prezime">Prezime:</label>
                  </div>
                  <div class="col-xs-8">
                    <input type="text" class="cool-input" name="prezime" id="prezime" value="{{ old('prezime') ?? $participant->prezime  }}" required/>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="control-label col-xs-4 text-right">
                    <label for="datum_rodjenja">Datum rođenja:</label>
                  </div>
                  <div class="col-xs-8">
                    <input type="date" class="cool-input" name="datum_rodjenja" id="datum_rodjenja" value="{{ old('datum_rodjenja') ?? date('Y-m-d', strtotime($participant->datum_rodjenja)) }}" />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="control-label col-xs-4 text-right">
                    <label for="mjesto_prebivalista">Mjesto prebivališta:</label>
                  </div>
                  <div class="col-xs-8">
                    <input type="text" class="cool-input" name="mjesto_prebivalista" id="mjesto_prebivalista" value="{{ old('mjesto_prebivalista') ?? $participant->mjesto_prebivalista }}" />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-4 text-right">
                    <label for="broj_telefona">Broj telefona:</label>
                  </div>
                  <div class="col-xs-8">
                    <input type="tel" class="cool-input" name="broj_telefona" id="broj_telefona" value="{{ old('broj_telefona') ?? $participant->broj_telefona }}" />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-4 text-right">
                    <label for="email">Email:</label>
                  </div>
                  <div class="col-xs-8">
                    <input type="email" class="cool-input" name="email" id="email" value="{{ old('email') ?? $participant->email }}" required />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-4 text-right">
                    <label for="status">Status:</label>
                  </div>
                  <div class="col-xs-8">
                    {!! Form::select('status', config('platforma.statusi'), old('status') ?? array_search($participant->status, config('platforma.statusi')), ['class' => 'cool-input', 'required']) !!}
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-4 text-right">
                    <label for="fakulteti">Fakulteti:</label>
                  </div>
                  <div class="col-xs-8">
                    {!! Form::select('fakulteti[]', $faculties, old('fakulteti') ?? $participant->fakulteti, ['class' => 'form-control', 'multiple' => true, 'style' => 'height: 200px;', 'required']) !!}
                  </div>
                </div>
              </div>
            </div>
              <div class="row">
                <div class="col-xs-12">
                  <section class="section" id="radnaIskustva">
                    <div class="row">
                      <div class="col-xs-12 flex-row_nowrap">
                        <span class="section-title">
                          radno iskustvo
                        </span>
                        <div class="section-title_line"></div>
                      </div>
                    </div>

                    <button type="button" class="btn btn-large btn-green_fill btn-radius" id="btnDodajRadnoIskustvo"> 
                      <i class="fas fa-plus"></i> Dodaj
                    </button>

                    @forelse ($experiences->where('type', 'work') as $experience)
                      <div class="subsection" id="{{ 'radno_iskustvo-' . $loop->index }}">
                        <input type="hidden" name='{{ "radno_iskustvo[$loop->index][method]" }}' value="update">
                        <input type="hidden" name='{{ "radno_iskustvo[$loop->index][type]" }}' value="work">
                        <input type="hidden" name='{{ "radno_iskustvo[$loop->index][id]" }}' value="{{ $experience->id }}">
                        <div class="row">
                          <div class="col-md-9 col-xs-12 flex-row_nowrap">
                            <span class="section-subtitle">
                              {!! Form::text("radno_iskustvo[$loop->index][title]", old("radno_iskustvo[$loop->index][title]") ?? $experience->title, ['class' => 'cool-input', 'placeholder' => 'Naziv', 'required']) !!}
                            </span>
                            &nbsp;&nbsp;&minus;&nbsp;&nbsp;
                            <span class="section-subtitle_second">
                              {!! Form::text("radno_iskustvo[$loop->index][position]", old("radno_iskustvo[$loop->index][position]") ?? $experience->position, ['class' => 'cool-input', 'placeholder' => 'Pozicija']) !!}
                            </span>
                          </div>
                          <div class="col-md-3 col-sm-6 col-xs-12">
                            <button type="button" class="btn btn-large btn-red btn-block btn-radius btn-hide" data-id="{{ $loop->index }}" data-type="radno_iskustvo">
                              <i class="fas fa-unlink"></i> Ukloni
                            </button>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12">
                            <span class="section-subtitle_period flex-row_nowrap">
                              Od: &nbsp;&nbsp; 
                              {!! Form::select("radno_iskustvo[$loop->index][from_month]", ['Januar', 'Februrar', 'Mart', 'April', 'Maj', 'Juni', 'Juli', 'August', 'Septembar', 'Oktobar', 'Novembar', 'Decembar'], old("radno_iskustvo[$loop->index][from_month]") ?? $experience->from_month, ['class' => 'cool-input', 'style' => 'width: auto']) !!}

                              {!! Form::select("radno_iskustvo[$loop->index][from_year]", config('platforma.godine'), old("radno_iskustvo[$loop->index][from_year]") ?? $experience->from_year, ['class' => 'cool-input', 'style' => 'width: auto']) !!}
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                Do: &nbsp;&nbsp; 
                              {!! Form::select("radno_iskustvo[$loop->index][to_month]", [null, 'Januar', 'Februrar', 'Mart', 'April', 'Maj', 'Juni', 'Juli', 'August', 'Septembar', 'Oktobar', 'Novembar', 'Decembar'], old("radno_iskustvo[$loop->index][to_month]") ?? $experience->to_month, ['class' => 'cool-input', 'style' => 'width: auto', 'disabled' => $experience->to_month === null]) !!}

                              {!! Form::select("radno_iskustvo[$loop->index][to_year]", [null] + config('platforma.godine'), old("radno_iskustvo[$loop->index][to_year]") ?? $experience->to_year, ['class' => 'cool-input', 'style' => 'width: auto', 'disabled' => $experience->to_year === null]) !!}
                              &nbsp;&nbsp; 
                              {!! Form::checkbox("radno_iskustvo[$loop->index][present]", old("radno_iskustvo[$loop->index][present]"), ! $experience->to_year && ! $experience->to_month, ['class' => 'cool-input work-check', 'style' => 'width: auto; margin: 0;'] ) !!}
                              &nbsp;
                              Traje
                            </span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12">
                            <p class="section-content">
                              <textarea rows="5" class="cool-input" name='{{ "radno_iskustvo[$loop->index][content]" }}' placeholder="Detaljan opis">{{ $experience->content }}</textarea>
                            </p>
                          </div>
                        </div>
                      </div>
                    @empty
                    <br/>
                      <span class="section-subtitle_second">
                        Nema
                      </span>
                    @endforelse
                  
                  </section>


                  <!-- ---------------------------- -->

                  <section class="section" id="prakse">
                    <div class="row">
                      <div class="col-xs-12 flex-row_nowrap">
                        <span class="section-title">
                          prakse
                        </span>
                        <div class="section-title_line"></div>
                      </div>
                    </div>

                    <button type="button" class="btn btn-large btn-green_fill btn-radius" id="btnDodajPraksu"> 
                      <i class="fas fa-plus"></i> Dodaj
                    </button>

                    @forelse ($experiences->where('type', 'internship') as $experience)
                      <div class="subsection" id="{{ 'internship-' . $loop->index }}">
                        <input type="hidden" name='{{ "internship[$loop->index][method]" }}' value="update">
                        <input type="hidden" name='{{ "internship[$loop->index][type]" }}' value="internship">
                        <input type="hidden" name='{{ "internship[$loop->index][id]" }}' value="{{ $experience->id }}">
                        <div class="row">
                          <div class="col-md-9 col-xs-12 flex-row_nowrap">
                            <span class="section-subtitle">
                              {!! Form::text("internship[$loop->index][title]", old("internship[$loop->index][title]") ?? $experience->title, ['class' => 'cool-input', 'placeholder' => 'Naziv', 'required']) !!}
                            </span>
                            &nbsp;&nbsp;&minus;&nbsp;&nbsp;
                            <span class="section-subtitle_second">
                              {!! Form::text("internship[$loop->index][position]", old("internship[$loop->index][position]") ?? $experience->position, ['class' => 'cool-input', 'placeholder' => 'Pozicija']) !!}
                            </span>
                          </div>
                          <div class="col-md-3 col-sm-6 col-xs-12">
                            <button type="button" class="btn btn-large btn-red btn-block btn-radius btn-hide" data-id="{{ $loop->index }}" data-type="internship">
                              <i class="fas fa-unlink"></i> Ukloni
                            </button>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12">
                            <span class="section-subtitle_period flex-row_nowrap">
                              Od: &nbsp;&nbsp; 
                              {!! Form::select("internship[$loop->index][from_month]", ['Januar', 'Februrar', 'Mart', 'April', 'Maj', 'Juni', 'Juli', 'August', 'Septembar', 'Oktobar', 'Novembar', 'Decembar'], old("internship[$loop->index][from_month]") ?? $experience->from_month, ['class' => 'cool-input', 'style' => 'width: auto']) !!}

                              {!! Form::select("internship[$loop->index][from_year]", config('platforma.godine'), old("internship[$loop->index][from_year]") ?? $experience->from_year, ['class' => 'cool-input', 'style' => 'width: auto']) !!}
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                Do: &nbsp;&nbsp; 
                              {!! Form::select("internship[$loop->index][to_month]", [null, 'Januar', 'Februrar', 'Mart', 'April', 'Maj', 'Juni', 'Juli', 'August', 'Septembar', 'Oktobar', 'Novembar', 'Decembar'], old("internship[$loop->index][to_month]") ?? $experience->to_month, ['class' => 'cool-input', 'style' => 'width: auto', 'disabled' => $experience->to_month === null]) !!}

                              {!! Form::select("internship[$loop->index][to_year]", [null] + config('platforma.godine'), old("internship[$loop->index][to_year]") ?? $experience->to_year, ['class' => 'cool-input', 'style' => 'width: auto', 'disabled' => $experience->to_year === null]) !!}
                              &nbsp;&nbsp; 
                              {!! Form::checkbox("internship[$loop->index][present]", old("internship[$loop->index][present]"), ! $experience->to_year && ! $experience->to_month, ['class' => 'cool-input work-check', 'style' => 'width: auto; margin: 0;'] ) !!}
                              &nbsp;
                              Traje
                            </span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12">
                            <p class="section-content">
                              <textarea rows="5" class="cool-input" name='{{ "internship[$loop->index][content]" }}' placeholder="Detaljan opis" required>{{ $experience->content }}</textarea>
                            </p>
                          </div>
                        </div>
                      </div>
                    @empty
                    <br/>
                      <span class="section-subtitle_second">
                        Nema
                      </span>
                    @endforelse
                  
                  </section>

                  <!-- ---------------------------------------------------------------- -->

                  <section class="section" id="nvoIskustva">
                    <div class="row">
                      <div class="col-xs-12 flex-row_nowrap">
                        <span class="section-title">
                          iskustvo u nvo
                        </span>
                        <div class="section-title_line"></div>
                      </div>
                    </div>
                    <button type="button" class="btn btn-large btn-green_fill btn-radius" id="btnDodajNvoIskustvo"> 
                      <i class="fas fa-plus"></i> Dodaj
                    </button>
                    @forelse ($experiences->where('type', 'ngo') as $experience)
                      <div class="subsection" id="{{ 'nvo-' . $loop->index }}">
                        <input type="hidden" name='{{ "nvo[$loop->index][method]" }}' value="update">
                        <input type="hidden" name='{{ "nvo[$loop->index][type]" }}' value="ngo">
                        <input type="hidden" name='{{ "nvo[$loop->index][id]" }}' value="{{ $experience->id }}">
                        <div class="row">
                          <div class="col-md-9 col-xs-12">
                            <span class="section-subtitle">
                              <!-- EESTEC LC SARAJEVO -->
                              {!! Form::text("nvo[$loop->index][title]", old("nvo[$loop->index][title]") ?? $experience->title, ['class' => 'cool-input', 'placeholder' => 'Organizacija', 'required']) !!}
                            </span>
                          </div>
                          <div class="col-md-3 col-sm-6 col-xs-12">
                            <button type="button" class="btn btn-large btn-red btn-block btn-radius btn-hide" data-id="{{ $loop->index }}" data-type="nvo">
                              <i class="fas fa-unlink"></i> Ukloni
                            </button>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12">
                            <p class="section-content">
                              <textarea rows="5" class="cool-input" name='{{ "nvo[$loop->index][content]" }}' placeholder="Detaljan opis" required>{{ $experience->content }}</textarea>
                            </p>
                          </div>
                        </div>
                      </div>
                    @empty
                      <br/>
                      <span class="section-subtitle_second">
                        Nema
                      </span>
                    @endforelse
                  </section>


                  <!-- ---------------------------- -->

                  <section class="section" id="extra_educations">
                    <div class="row">
                      <div class="col-xs-12 flex-row_nowrap">
                        <span class="section-title">
                          dodatne edukacije
                        </span>
                        <div class="section-title_line"></div>
                      </div>
                    </div>
                    <button type="button" class="btn btn-large btn-green_fill btn-radius" id="btnDodajExtraEducation"> 
                      <i class="fas fa-plus"></i> Dodaj
                    </button>
                    @forelse ($experiences->where('type', 'extra_educations') as $experience)
                      <div class="subsection" id="{{ 'extra_educations-' . $loop->index }}">
                        <input type="hidden" name='{{ "extra_educations[$loop->index][method]" }}' value="update">
                        <input type="hidden" name='{{ "extra_educations[$loop->index][type]" }}' value="extra_educations">
                        <input type="hidden" name='{{ "extra_educations[$loop->index][id]" }}' value="{{ $experience->id }}">
                        <div class="row">
                          <div class="col-md-9 col-xs-12">
                            <span class="section-subtitle">
                              {!! Form::text("extra_educations[$loop->index][title]", old("extra_educations[$loop->index][title]") ?? $experience->title, ['class' => 'cool-input', 'placeholder' => 'Naziv', 'required']) !!}
                            </span>
                          </div>
                          <div class="col-md-3 col-sm-6 col-xs-12">
                            <button type="button" class="btn btn-large btn-red btn-block btn-radius btn-hide" data-id="{{ $loop->index }}" data-type="extra_educations">
                              <i class="fas fa-unlink"></i> Ukloni
                            </button>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12">
                            <p class="section-content">
                              <textarea rows="5" class="cool-input" name='{{ "extra_educations[$loop->index][content]" }}' placeholder="Detaljan opis" required>{{ $experience->content }}</textarea>
                            </p>
                          </div>
                          <div class="col-md-7">
                            <div class="upload-btn-wrapper flex-row_wrap">
                              <button type="button" class="btn btn-large btn-gray btn-radius btn-upload" style="margin: 0 10px 5px 0;">
                                <i class="fas fa-file-pdf"></i> Upload certifikat
                              </button>
                              @if ($experience->certificate)
                                <a href="{{ asset($experience->certificate->location) }}" target="_blank">Pogledaj certifikat</a>
                                <input type="file" name='{{ "extra_educations[$loop->index][certifikat]" }}' class="file-upload" data-check="false">
                              @else
                                <input type="file" name='{{ "extra_educations[$loop->index][certifikat]" }}' class="file-upload">
                              @endif
                              
                            </div>
                            <span class="lead file-text" style="display: none;"></span>
                          </div>
                        </div>
                      </div>
                    @empty
                      <br/>
                      <span class="section-subtitle_second">
                        Nema
                      </span>
                    @endforelse
                  </section>
                  <!-- ---------------------------- -->
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-large btn-green_fill btn-radius" id="submit-edit-profile_form"> 
                      <i class="fas fa-save"></i> Spasi
                    </button>
                </div>
              </div>
            {!! Form::close() !!}

            @endsection