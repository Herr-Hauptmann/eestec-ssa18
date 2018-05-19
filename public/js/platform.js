(function() {
	// $("#slika").change(function() { // bCheck is a input type button
	let csrf_token = $('[name=csrf-token]').attr('content');

	$('#btn-upload').click(function(e) {
		e.preventDefault();
		$('#slika').click();
	})

	$('#slika').change(function() {
		let fileName = $(this).val();

		if (fileName) {
			let nameSplit = fileName.split(/[\\\/]/);
			fileName = nameSplit[nameSplit.length - 1];
			$('#slikaText').text(fileName).show('slow');
		} else {
			$('#slikaText').hide('slow');
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
			},
			function(res) {
				console.log(res, res.ime);
				if (! res.error) {
					$('#name').val(res.ime);
					$('#email').val(res.email);
					$('#registrationModalEmail').fadeOut(500);
					setTimeout(function() {
						$('#registrationModalEmail').modal('hide');
					}, 500);
				} else {
					$('#emailTryError').html(`<b>${res.error}</b>`).show();
					$('#emailTry').parent().addClass('has-error');
				}
			}
		);
	});

	// dodavanje iskustva

	let godine = '';
	let mjeseci = '';
	let mjeseciArray = [
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

	for(let i = 0; i < 12; i++) {
		mjeseci += `<option value="${i}"` + (i === 0 ? ' selected' : '')  + `>${mjeseciArray[i]}</option>`;
	}

	$('#btnDodajRadnoIskustvo').click(function(e) {
		e.preventDefault();
		let index = $('#radnaIskustva').find('.subsection').length;
		let item = $(`<div class="subsection" style="display: none;" id="radno_iskustvo-${index}">
			<input type="hidden" name="radno_iskustvo[${index}][method]" value="new"/>
			<input type="hidden" name="radno_iskustvo[${index}][type]" value="work"/>
		    <div class="row">
		      <div class="col-xs-10 flex-row_nowrap">
		        <span class="section-subtitle">
		          <input type="text" class="cool-input" name="radno_iskustvo[${index}][title]" placeholder="Naziv">
		        </span>
		        &nbsp;&nbsp;−&nbsp;&nbsp;
		        <span class="section-subtitle_second">
		          <input type="text" class="cool-input" name="radno_iskustvo[${index}][position]" placeholder="Pozicija">
		        </span>
		      </div>
		      <div class="col-xs-2">
		      	<button type="button" class="btn btn-large btn-red btn-block btn-radius btn-hide" data-id="${index}">
                  <i class="fas fa-thrash"></i> Ukloni
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
	});

	$(document).on('click', '.btn-hide', function(e) {
		e.preventDefault();
		let id = $(this).attr('data-id');
		$('#radno_iskustvo-' + id).slideUp();
		$('input[name="radno_iskustvo[' + id + '][method]"]').val('delete');
	});

})()