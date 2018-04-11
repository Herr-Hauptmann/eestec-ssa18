(function() {
	// $("#slika").change(function() { // bCheck is a input type button
	//     var fileName = $(this).val();

	//     if(fileName) { // returns true if the string is not empty
	//         alert(fileName + " was selected");
	//     } 
	// });

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
	})
})()