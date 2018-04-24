<!-- Modal -->
@extends('layouts.participants')
@section('content')
          <form method="POST" action="#" id="edit-profile_form">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-4 col-xs-12">
                <div class="row">
                  <div class="col-md-12 col-md-offset-0 col-sm-offset-3 col-xs-8 col-xs-offset-2 col-sm-6 match-height">
                    <div class="profile-img" style="background-image: url({{ asset('img/tarik_sahinovic.jpg') }}); margin-bottom: 20px;">
                    </div>
                  </div>
                  <div class="col-md-12 col-md-offset-0 col-sm-offset-3 col-xs-8 col-xs-offset-2 col-sm-6 match-height flex-center">
                    <div class="upload-btn-wrapper">

                      <button class="btn btn-large btn-green btn-block btn-radius" id="btn-upload">
                        <i class="fas fa-upload"></i> Upload
                      </button>
                      <input type="file" name="slika" id="slika" />
                    </div>

                    <span class="lead" id="slikaText" style="display: none;"></span>

                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xs-12">
                <div class="form-group row">
                  <div class="col-xs-4 text-right">
                    <label for="ime_i_prezime">Ime i prezime:</label>
                  </div>
                  <div class="col-xs-8">
                    <input type="text" class="cool-input" name="ime_i_prezime" id="ime_i_prezime" />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="control-label col-xs-4 text-right">
                    <label for="datum_rodjenja">Datum rođenja:</label>
                  </div>
                  <div class="col-xs-8">
                    <input type="date" class="cool-input" name="datum_rodjenja" id="datum_rodjenja" />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="control-label col-xs-4 text-right">
                    <label for="mjesto_prebivalista">Adresa:</label>
                  </div>
                  <div class="col-xs-8">
                    <input type="text" class="cool-input" name="mjesto_prebivalista" id="mjesto_prebivalista" />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-4 text-right">
                    <label for="broj_telefona">Broj telefona:</label>
                  </div>
                  <div class="col-xs-8">
                    <input type="tel" class="cool-input" name="broj_telefona" id="broj_telefona" />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-4 text-right">
                    <label for="email">Email:</label>
                  </div>
                  <div class="col-xs-8">
                    <input type="email" class="cool-input" name="email" id="email" />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-4 text-right">
                    <label for="status">Status:</label>
                  </div>
                  <div class="col-xs-8">
                    {!! Form::select('status', ['Student', 'Student Bachelor', 'Student Master', 'Doktor', 'Zaposlen/a'], null, ['class' => 'cool-input']) !!}
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-4 text-right">
                    <label for="fakulteti">Fakulteti:</label>
                  </div>
                  <div class="col-xs-8">
                    {!! Form::select('fakulteti', $faculties, null, ['class' => 'form-control', 'multiple' => true]) !!}
                  </div>
                </div>
              </div>
            </div>
              <div class="row">
                <div class="col-xs-12">
                  <section class="section">
                    <div class="row">
                      <div class="col-xs-12 flex-row_nowrap">
                        <span class="section-title">
                          radno iskustvo
                        </span>
                        <div class="section-title_line"></div>
                      </div>
                    </div>
                    <div class="subsection">
                      <div class="row">
                        <div class="col-xs-12 flex-row_nowrap">
                          <span class="section-subtitle">
                            <!-- soft skills academy sarajevo 2017 -->
                            <input type="text" class="cool-input" value="soft skills academy sarajevo 2017"  />
                          </span>
                          &nbsp;&nbsp;&minus;&nbsp;&nbsp;
                          <span class="section-subtitle_second">
                            <!-- Design Team Leader -->
                            <input type="text" class="cool-input" value="Design Team Leader" />
                          </span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12">
                          <span class="section-subtitle_period flex-row_nowrap">
                            Od: &nbsp;&nbsp; 
                            {!! Form::select('radno_iskustvo[0][mjesec_start]', ['Januar', 'Februrar', 'Mart', 'April', 'Maj', 'Juni', 'Juli', 'August', 'Septembar', 'Oktobar', 'Novembar', 'Decembar'], null, ['class' => 'cool-input', 'style' => 'width: auto']) !!}
                            {!! Form::select('radno_iskustvo[0][mjesec_godina]', range(date('Y'), 1990), null, ['class' => 'cool-input', 'style' => 'width: auto']) !!}
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              Do: &nbsp;&nbsp; 
                            {!! Form::select('radno_iskustvo[0][mjesec_start]', ['Januar', 'Februrar', 'Mart', 'April', 'Maj', 'Juni', 'Juli', 'August', 'Septembar', 'Oktobar', 'Novembar', 'Decembar'], null, ['class' => 'cool-input', 'style' => 'width: auto']) !!}
                            {!! Form::select('radno_iskustvo[0][mjesec_godina]', range(date('Y'), 1990), null, ['class' => 'cool-input', 'style' => 'width: auto']) !!}
                          </span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12">
                          <p class="section-content">
                            <!-- Leading a team of experienced and new designers who came together to create a whole new visual identity for a workshop held in Sarajevo and designing material ranging from brochures to application and website UI -->
                            <textarea rows="5" class="cool-input">Leading a team of experienced and new designers who came together to create a whole new visual identity for a workshop held in Sarajevo and designing material ranging from brochures to application and website UILeading a team of experienced and new designers who came together to create a whole new visual identity for a workshop held in Sarajevo and designing material ranging from brochures to application and website UILeading a team of experienced and new designers who came together to create a whole new visual identity for a workshop held in Sarajevo and designing material ranging from brochures to application and website UI</textarea>
                          </p>
                        </div>
                      </div>
                    </div>

                  
                  </section>


                  <!-- ---------------------------- -->

                  <section class="section">
                    <div class="row">
                      <div class="col-xs-12 flex-row_nowrap">
                        <span class="section-title">
                          iskustvo u nvo
                        </span>
                        <div class="section-title_line"></div>
                      </div>
                    </div>
                    <div class="subsection">
                      <div class="row">
                        <div class="col-xs-12">
                          <span class="section-subtitle">
                            <!-- EESTEC LC SARAJEVO -->
                            <input type="text" class="cool-input" value="EESTEC LC SARAJEVO"  />
                          </span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12">
                          <p class="section-content">
                            <!-- By being a member of this organization, I’ve been participating in creating visual identities and creating all sorts of designs for promotional material for this organizations’ events as well as being part of teams who created websites and applications dating back from July 2016. I’ve also been mentoring and educating younger and less experienced designers who wanted to learn more and are today considered to be a vital part of the designer climate in the organization. -->
                            <textarea class="cool-input" rows="5">By being a member of this organization, I’ve been participating in creating visual identities and creating all sorts of designs for promotional material for this organizations’ events as well as being part of teams who created websites and applications dating back from July 2016. I’ve also been mentoring and educating younger and less experienced designers who wanted to learn more and are today considered to be a vital part of the designer climate in the organization.</textarea>
                          </p>
                        </div>
                      </div>
                    </div>
                  </section>


                  <!-- ---------------------------- -->

                  <section class="section">
                    <div class="row">
                      <div class="col-xs-12 flex-row_nowrap">
                        <span class="section-title">
                          DODATNE EDUAKCIJE
                        </span>
                        <div class="section-title_line"></div>
                      </div>
                    </div>
                    <div class="subsection">
                      <div class="row">
                        <div class="col-xs-12">
                          <span class="section-subtitle">
                            MICROSOFT SKILLS CENTER
                          </span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12">
                          <p class="section-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nulla libero, feugiat at accumsan vitae, auctor quis metus. Aenean placerat augue nec aliquam blandit. Suspendisse faucibus erat congue, finibus leo sed, convallis libero.
                          </p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-5 col-sm-4 col-sm-offset-4 col-md-offset-0">
                          <a class="btn btn-large btn-green btn-block btn-radius" href="#"><span class="glyphicon glyphicon-pencil"></span> certifikat</a>
                        </div>
                      </div>
                    </div>
                  </section>

                  <!-- ---------------------------- -->

                  <section class="section">
                    <div class="row">
                      <div class="col-xs-12 flex-row_nowrap">
                        <span class="section-title">
                          ostalo
                        </span>
                        <div class="section-title_line"></div>
                      </div>
                    </div>
                  </section>
                </div>
              </div>
            </form>
            @endsection