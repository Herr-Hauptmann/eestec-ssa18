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

	$('#btnDodajRadnoIskustvo').click(function(e) {
		e.preventDefault();
		let index = $('#radnaIskustva').find('.subsection').length;
		let item = $(`<div class="subsection" style="display: none;" id="radno_iskustvo-${index}">
		    <div class="row">
		      <div class="col-xs-12 flex-row_nowrap">
		        <span class="section-subtitle">
		          <input type="text" class="cool-input" name="radno_iskustvo[${index}][title]" placeholder="Naziv">
		        </span>
		        &nbsp;&nbsp;−&nbsp;&nbsp;
		        <span class="section-subtitle_second">
		          <input type="text" class="cool-input" name="radno_iskustvo[${index}][position]" placeholder="Pozicija">
		        </span>
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-xs-12">
		        <span class="section-subtitle_period flex-row_nowrap">
		          Od: &nbsp;&nbsp; 
		          <select class="cool-input" style="width: auto" name="radno_iskustvo[${index}][from_month]"><option value="0">Januar</option><option value="1">Februrar</option><option value="2">Mart</option><option value="3">April</option><option value="4">Maj</option><option value="5">Juni</option><option value="6">Juli</option><option value="7">August</option><option value="8">Septembar</option><option value="9">Oktobar</option><option value="10">Novembar</option><option value="11">Decembar</option></select>
		          <select class="cool-input" style="width: auto" name="radno_iskustvo[${index}][from_year]"><option value="0">2018</option><option value="1">2017</option><option value="2">2016</option><option value="3">2015</option><option value="4">2014</option><option value="5">2013</option><option value="6">2012</option><option value="7">2011</option><option value="8">2010</option><option value="9">2009</option><option value="10">2008</option><option value="11">2007</option><option value="12">2006</option><option value="13">2005</option><option value="14">2004</option><option value="15">2003</option><option value="16">2002</option><option value="17">2001</option><option value="18">2000</option><option value="19">1999</option><option value="20">1998</option><option value="21">1997</option><option value="22">1996</option><option value="23">1995</option><option value="24">1994</option><option value="25">1993</option><option value="26">1992</option><option value="27">1991</option><option value="28">1990</option></select>
		            &nbsp;&nbsp;&nbsp;&nbsp;
		            Do: &nbsp;&nbsp; 
		          <select class="cool-input" style="width: auto" name="radno_iskustvo[${index}][to_month]"><option value="0">Januar</option><option value="1">Februrar</option><option value="2">Mart</option><option value="3">April</option><option value="4">Maj</option><option value="5">Juni</option><option value="6">Juli</option><option value="7">August</option><option value="8">Septembar</option><option value="9">Oktobar</option><option value="10">Novembar</option><option value="11">Decembar</option></select>
		          <select class="cool-input" style="width: auto" name="radno_iskustvo[${index}][to_year]"><option value="0">2018</option><option value="1">2017</option><option value="2">2016</option><option value="3">2015</option><option value="4">2014</option><option value="5">2013</option><option value="6">2012</option><option value="7">2011</option><option value="8">2010</option><option value="9">2009</option><option value="10">2008</option><option value="11">2007</option><option value="12">2006</option><option value="13">2005</option><option value="14">2004</option><option value="15">2003</option><option value="16">2002</option><option value="17">2001</option><option value="18">2000</option><option value="19">1999</option><option value="20">1998</option><option value="21">1997</option><option value="22">1996</option><option value="23">1995</option><option value="24">1994</option><option value="25">1993</option><option value="26">1992</option><option value="27">1991</option><option value="28">1990</option></select>
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

})()