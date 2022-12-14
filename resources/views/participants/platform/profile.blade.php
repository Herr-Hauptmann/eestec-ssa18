@extends('layouts.participants')
@section('content')
	<div class="row">
		<div class="col-md-4 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 col-sm-offset-3 col-xs-8 col-xs-offset-2 col-sm-6 match-height">
					<div class="profile-img" style="background-image: url({{ asset($participant->slika ?? 'img/profile-placeholder.png') }}); margin-bottom: 20px;">
					</div>
				</div>
				<div class="col-md-12 col-md-offset-0 col-sm-offset-3 col-xs-8 col-xs-offset-2 col-sm-6 match-height flex-center">
					<a class="btn btn-large btn-green btn-block btn-radius" href="{{ route('participant.edit') }}">
						<i class="fas fa-pencil-alt"></i> Uredi profil
					</a>
					<a class="btn btn-large btn-green_fill btn-block btn-radius" href="#"> 
						<i class="fas fa-link"></i> Kopiraj link
					</a>
					<a class="btn btn-large btn-gray_fill btn-block btn-radius" href="{{ route('logout') }}" 
						onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
						<i class="fas fa-sign-out-alt"></i> Logout
					</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
				</div>
			</div>
		</div>
		<div class="col-md-8 col-xs-12" id="participant-info">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading">{{ $participant->ime . ' ' . $participant->prezime }}</div>
				</div>
			</div>
			<div class="row basic-info">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<i class="far fa-calendar-alt"></i> {{ date('d.m.Y.', strtotime($participant->datum_rodjenja)) }}<br/>
					<i class="fas fa-map-marker"></i> &nbsp;{!! $participant->mjesto_prebivalista ?? '<i>Nije uneseno</i>' !!}<br/>
					<i class="fas fa-phone"></i> {!! $participant->broj_telefona ?? '<i>Nije uneseno</i>' !!}<br/>
					<i class="far fa-envelope"></i> {!! $participant->email ?? '<i>Nije uneseno</i>' !!}<br/>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="row">
						<div class="col-sm-4 col-xs-3 basic-info_special">
							Status:
						</div>
						<div class="col-sm-8 col-xs-9 text-left text-impact_blue">
							@if (\is_numeric($participant->status))
								{{ config('platforma.statusi')[$participant->status] }}
							@else 
								{!! $participant->status ?? '<i>Nije uneseno</i>' !!}
							@endif
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-3 basic-info_special">
							Fakulteti:
						</div>
						<div class="col-sm-8 col-xs-9 text-left text-impact_blue">
							@forelse ($participant->fakulteti as $fakultet)
								{{ $fakultet->naziv . '; ' }}
							@empty
								<i>Nije uneseno</i>
							@endforelse
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
								<div class="col-xs-12">
									<span class="section-subtitle">
										soft skills academy sarajevo 2017
									</span>
									&nbsp;&nbsp;&minus;&nbsp;&nbsp;
									<span class="section-subtitle_second">
										Design Team Leader
									</span>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<span class="section-subtitle_period">
										November 2016 - March 2017
									</span>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<p class="section-content">
										Leading a team of experienced and new designers who came together to create a whole new visual identity for a workshop held in Sarajevo and designing material ranging from brochures to application and website UI
									</p>
								</div>
							</div>
						</div>

						<div class="subsection">
							<div class="row">
								<div class="col-xs-12">
									<span class="section-subtitle">
										soft skills academy sarajevo 2017
									</span>
									&nbsp;&nbsp;&minus;&nbsp;&nbsp;
									<span class="section-subtitle_second">
										Design Team Leader
									</span>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<span class="section-subtitle_period">
										November 2016 - March 2017
									</span>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<p class="section-content">
										Leading a team of experienced and new designers who came together to create a whole new visual identity for a workshop held in Sarajevo and designing material ranging from brochures to application and website UI
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
										EESTEC LC SARAJEVO
									</span>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<p class="section-content">
										By being a member of this organization, I???ve been participating in creating visual identities and creating all sorts of designs for promotional material for this organizations??? events as well as being part of teams who created websites and applications dating back from July 2016. I???ve also been mentoring and educating younger and less experienced designers who wanted to learn more and are today considered to be a vital part of the designer climate in the organization.
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
		</div>
	</div>
@endsection