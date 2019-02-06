(function() {
	// $("#slika").change(function() { // bCheck is a input type button
	let csrf_token = $('[name=csrf-token]').attr('content');

	$(document).on('click', '.btn-upload', function(e) {
		e.preventDefault();
		$(this).siblings('.file-upload').click();
	});

	$(document).on('change', '.file-upload', function() {
		let fileName = $(this).val();

		if (fileName) {
			let nameSplit = fileName.split(/[\\\/]/);
			fileName = nameSplit[nameSplit.length - 1];
			$(this).parent().parent().find('span.file-text').text(fileName).show('slow');
		} else {
			$(this).parent().parent().find('span.file-text').hide('slow');
		}
	});

	// provjera da li email postoji u bazi, za registraciju

	let emailCheckUrl = $('#checkEmailForm').attr('action');
	$('#checkEmailForm').on('submit', function(e) {
		e.preventDefault();
		$.post(
			emailCheckUrl,
			{
				_token: csrf_token,
				email: $('#emailTry').val()
			}).then(function(res) {
				let participant = res.participant;
				console.log(res['participant']);
				if (reparticipant.ime) {
					$('#name').val(participant.ime);
					$('#email').val(participant.email);
					$('#registrationModalEmail').fadeOut(500);
					setTimeout(function() {
						$('#registrationModalEmail').modal('hide');
					}, 500);
				} else if (res.error){
					$('#emailTryError').html(`<b>${res.error}</b>`).show();
					$('#emailTry').parent().addClass('has-error');
				} else {
					$('#emailTryError').html('<b>Došlo je do pogreške. Pokušajte ponovo.</b>').show();
					$('#emailTry').parent().addClass('has-error');
				}
			}).catch(function(res) {
				console.warn(res);
		})
	});

	// dodavanje iskustva

	let godine = '';
	let mjeseci = '';
	let mjeseciArray = [
		'',
		'Januar',
		'Februrar',
		'Mart',
		'April',
		'Maj',
		'Juni',
		'Juli',
		'August',
		'Septembar',
		'Oktobar',
		'Novembar',
		'Decembar'
	];

	let currentYear = (new Date()).getFullYear();

	for(let i = currentYear; i >= 1990; i--) {
		godine += `<option value="${i}"` + (i === currentYear ? ' selected' : '') + `>${i}</option>`;
	}

	for(let i = 0; i < 13; i++) {
		mjeseci += `<option value="${i}"` + (i === 1 ? ' selected' : '')  + `>${mjeseciArray[i]}</option>`;
	}

	$('#btnDodajRadnoIskustvo').click(function(e) {
		e.preventDefault();
		let index = $('#radnaIskustva').find('.subsection').length;
		if (index === 0) {
			$('#radnaIskustva').find('button.btn-green_fill').siblings('span.section-subtitle_second').hide('fast').remove();
		}
		let item = $(`<div class="subsection" style="display: none;" id="radno_iskustvo-${index}">
			<input type="hidden" name="radno_iskustvo[${index}][method]" value="new"/>
			<input type="hidden" name="radno_iskustvo[${index}][type]" value="work"/>
		    <div class="row">
		      <div class="col-md-9 col-xs-12 flex-row_nowrap">
		        <span class="section-subtitle">
		          <input type="text" class="cool-input" name="radno_iskustvo[${index}][title]" placeholder="Naziv" required>
		        </span>
		        &nbsp;&nbsp;−&nbsp;&nbsp;
		        <span class="section-subtitle_second">
		          <input type="text" class="cool-input" name="radno_iskustvo[${index}][position]" placeholder="Pozicija">
		        </span>
		      </div>
		      <div class="col-md-3 col-sm-6 col-xs-12">
		      	<button type="button" class="btn btn-large btn-red btn-block btn-radius btn-hide" data-id="${index}" data-type="radno_iskustvo">
                  <i class="fas fa-unlink"></i> Ukloni
                </button>
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-xs-12">
		        <span class="section-subtitle_period flex-row_nowrap">
		          Od: &nbsp;&nbsp; 
		          <select class="cool-input" style="width: auto" name="radno_iskustvo[${index}][from_month]" required>${mjeseci}</select>
		          <select class="cool-input" style="width: auto" name="radno_iskustvo[${index}][from_year]" required>${godine}</select>
		            &nbsp;&nbsp;&nbsp;&nbsp;
		            Do: &nbsp;&nbsp; 
		          <select class="cool-input" style="width: auto" name="radno_iskustvo[${index}][to_month]" required>${mjeseci}</select>
		          <select class="cool-input" style="width: auto" name="radno_iskustvo[${index}][to_year]" required>${godine}</select>
		        	&nbsp;&nbsp;
		        	<input class="cool-input work-check" style="width: auto; margin: 0;" 
		        			name="radno_iskustvo[${index}][present]" type="checkbox">
	                  &nbsp;
	                  Traje
		        </span>
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-xs-12">
		        <p class="section-content">
		          <textarea rows="5" class="cool-input" name="radno_iskustvo[${index}][content]" placeholder="Detaljan opis"></textarea>
		        </p>
		      </div>
		    </div>
		  </div>`);
		$('#radnaIskustva').append(item).find('.subsection:last-child').slideDown();
		changeDefaultValidatonMessages();
	});

	$('#btnDodajPraksu').click(function(e) {
		e.preventDefault();
		let index = $('#prakse').find('.subsection').length;
		if (index === 0) {
			$('#prakse').find('button.btn-green_fill').siblings('span.section-subtitle_second').hide('fast').remove();
		}
		let item = $(`<div class="subsection" style="display: none;" id="internship-${index}">
			<input type="hidden" name="internship[${index}][method]" value="new"/>
			<input type="hidden" name="internship[${index}][type]" value="internship"/>
		    <div class="row">
		      <div class="col-md-9 col-xs-12 flex-row_nowrap">
		        <span class="section-subtitle">
		          <input type="text" class="cool-input" name="internship[${index}][title]" placeholder="Naziv" required>
		        </span>
		        &nbsp;&nbsp;−&nbsp;&nbsp;
		        <span class="section-subtitle_second">
		          <input type="text" class="cool-input" name="internship[${index}][position]" placeholder="Pozicija">
		        </span>
		      </div>
		      <div class="col-md-3 col-sm-6 col-xs-12">
		      	<button type="button" class="btn btn-large btn-red btn-block btn-radius btn-hide" data-id="${index}" data-type="internship">
                  <i class="fas fa-unlink"></i> Ukloni
                </button>
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-xs-12">
		        <span class="section-subtitle_period flex-row_nowrap">
		          Od: &nbsp;&nbsp; 
		          <select class="cool-input" style="width: auto" name="internship[${index}][from_month]" required>${mjeseci}</select>
		          <select class="cool-input" style="width: auto" name="internship[${index}][from_year]" required>${godine}</select>
		            &nbsp;&nbsp;&nbsp;&nbsp;
		            Do: &nbsp;&nbsp; 
		          <select class="cool-input" style="width: auto" name="internship[${index}][to_month]" required>${mjeseci}</select>
		          <select class="cool-input" style="width: auto" name="internship[${index}][to_year]" required>${godine}</select>
		        	&nbsp;&nbsp;
		        	<input class="cool-input work-check" style="width: auto; margin: 0;" 
		        			name="internship[${index}][present]" type="checkbox">
	                  &nbsp;
	                  Traje
		        </span>
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-xs-12">
		        <p class="section-content">
		          <textarea rows="5" class="cool-input" name="internship[${index}][content]" placeholder="Detaljan opis" required></textarea>
		        </p>
		      </div>
		    </div>
		  </div>`);
		$('#prakse').append(item).find('.subsection:last-child').slideDown();
		changeDefaultValidatonMessages();
	});

	$('#btnDodajNvoIskustvo').click(function(e) {
		e.preventDefault();
		let index = $('#nvoIskustva').find('.subsection').length;
		if (index === 0) {
			$('#nvoIskustva').find('button.btn-green_fill').siblings('span.section-subtitle_second').hide('fast').remove();
		}
		let item = $(`<div class="subsection" style="display: none;" id="nvo-${index}">
                        <input type="hidden" name="nvo[${index}][method]" value="new">
                        <input type="hidden" name="nvo[${index}][type]" value="ngo"/>
                        <div class="row">
                          <div class="col-md-9 col-xs-12">
                            <span class="section-subtitle">
                              <input class="cool-input" name="nvo[${index}][title]" placeholder="Organizacija" required>
                            </span>
                          </div>
                          <div class="col-md-3 col-sm-6 col-xs-12">
                            <button type="button" class="btn btn-large btn-red btn-block btn-radius btn-hide" data-id="${index}" data-type="nvo">
                              <i class="fas fa-unlink"></i> Ukloni
                            </button>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12">
                            <p class="section-content">
                              <textarea rows="5" class="cool-input" name="nvo[${index}][content]" placeholder="Detaljan opis" required></textarea>
                            </p>
                          </div>
                        </div>
                      </div>`);

		$('#nvoIskustva').append(item).find('.subsection:last-child').slideDown();
		changeDefaultValidatonMessages();

	});

	$('#btnDodajExtraEducation').click(function(e) {
		e.preventDefault();
		let index = $('#extra_educations').find('.subsection').length;
		if (index === 0) {
			$('#extra_educations').find('button.btn-green_fill').siblings('span.section-subtitle_second').hide('fast').remove();
		}
		let item = $(`<div class="subsection" style="display: none;" id="extra_educations-${index}">
                        <input type="hidden" name="extra_educations[${index}][method]" value="new">
                        <input type="hidden" name="extra_educations[${index}][type]" value="extra_educations"/>
                        <div class="row">
                          <div class="col-md-9 col-xs-12">
                            <span class="section-subtitle">
                              <input class="cool-input" name="extra_educations[${index}][title]" placeholder="Naziv" required>
                            </span>
                          </div>
                          <div class="col-md-3 col-sm-6 col-xs-12">
                            <button type="button" class="btn btn-large btn-red btn-block btn-radius btn-hide" data-id="${index}" data-type="extra_educations">
                              <i class="fas fa-unlink"></i> Ukloni
                            </button>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12">
                            <p class="section-content">
                              <textarea rows="5" class="cool-input" name="extra_educations[${index}][content]" placeholder="Detaljan opis" required></textarea>
                            </p>
                          </div>
                          <div class="col-md-7">
                            <div class="upload-btn-wrapper flex-row_wrap">
                              <button type="button" class="btn btn-large btn-gray btn-radius btn-upload" style="margin: 0 10px 5px 0;">
                                <i class="fas fa-file-pdf"></i> Upload certifikat
                              </button>
                              <input type="file" name="extra_educations[${index}][certifikat]" class="file-upload" />
                            </div>
                            <span class="lead file-text" style="display: none;"></span>
                          </div>
                        </div>
                      </div>`);

		$('#extra_educations').append(item).find('.subsection:last-child').slideDown();
		changeDefaultValidatonMessages();
	});

	$(document).on('click', '.btn-hide', function(e) {
		e.preventDefault();
		let id = $(this).attr('data-id');
		let type = $(this).attr('data-type');
		let remove = true;
		if ($('input[name="' + type + '[' + id + '][title]"]').val() !== '') {
			remove = confirm('Sigurno želiš ukloniti \'' + $('input[name="' + type + '[' + id + '][title]"]').val() + '\'?');
		} 
		
		if (remove) {
			$('#' + type + '-' + id).slideUp();
			$('input[name="' + type + '[' + id + '][method]"]').val('delete');
			$('#' + type + '-' + id).find('*').removeAttr('required');
		}
	});

	$(document).on('click', '.work-check', function(e) {
		let $checkbox = $(this);
		if (this.checked) {
			$checkbox.prev().attr('disabled', true);
			$checkbox.prev().prev().attr('disabled', true);
		} else {
			$checkbox.prev().removeAttr('disabled');
			$checkbox.prev().prev().removeAttr('disabled');
		}
	});

	$(document).on('click', '#submit-dedit-profile_form', function(e) {
		e.preventDefault();
		let $form = $('#edit-profile_form');

		$form[0].checkValidity();
		$form[0].reportValidity();

		let submit = true;
		$('input:regex(name, extra_educations\\[[0-9]*\\]\\[certifikat\\])').each(function(i, item) {
			let $item = $(item);
			if ($item.attr('data-check') !== 'false' && ! $item.val()) {
				alert('Svaka dodatna edukacija mora sadržavati certifikat.');
				// zaustavi petlju

				submit = false;
				return false;
			}
			
		});
		if (submit) {
			$form.submit();
		}
	});

	// Promjena defaultnih poruka za validacije

	let invalid = function (e) {
	    if (e.target.validity.valueMissing) {
			e.target.setCustomValidity("Ovo polje je obavezno");
			return;
		}
	};

	function changeDefaultValidatonMessages() {
		let inputs = document.querySelectorAll('input,textarea,select');
		for (let i = 0; i < inputs.length; i++) {
			inputs[i].oninvalid = invalid;
			inputs[i].oninput = function(e) {
		    	e.target.setCustomValidity("");
			};
		}
	}
	
	changeDefaultValidatonMessages();

	// regex za jquery selector
	jQuery.expr[':'].regex = function(elem, index, match) {
	    var matchParams = match[3].split(','),
	        validLabels = /^(data|css):/,
	        attr = {
	            method: matchParams[0].match(validLabels) ? 
	                        matchParams[0].split(':')[0] : 'attr',
	            property: matchParams.shift().replace(validLabels,'')
	        },
	        regexFlags = 'ig',
	        regex = new RegExp(matchParams.join('').replace(/^\s+|\s+$/g,''), regexFlags);
	    return regex.test(jQuery(elem)[attr.method](attr.property));
	}

})()