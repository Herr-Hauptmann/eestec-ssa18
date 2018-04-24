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

})()