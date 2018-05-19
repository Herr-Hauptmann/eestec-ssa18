<?php

$godine = [];

foreach (range(date('Y'), 1990) as $year) {
	$godine["$year"] = $year;
}

return [
	'statusi' => [
		'Student', 
		'Student Bachelor', 
		'Student Master', 
		'Doktor', 
		'Zaposlen/a'
	],
	'iskustva' => [
		'work',
		'ngo',
		'extra_educations',
		'extra'
	],
	'godine' => $godine
];