<?php

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',

    'user.passwordResetTokenExpire' => 3600,
    'user.passwordMinLength' => 8,
    'supportEmail' => 'hello@chanakalk.com',

	'editor' => 'markdown',  //To enable WYSIWYG editor, set this value 'wysiwyg'. Default to markdown

	'about' => [
		'experience_started' => 2016,    //this will calculate experience with current year
		'so_reputation' => 797,
		'awards' => 2,
		'projects' => 6,
		'testimonials' => [
			[
				'img' => 'freelancer.png',
				'name' => 'Brandicon S.',
				'company' => 'Asatsa',
				'link' => 'http://egypt.asatsa.com/',
				'review' => 'Great developer! Was a complicated job to work with collecting data from 2 old sites and
                                connecting it with a totally new theme and plugins. But he never gave up and found the
                                solution. He managed to save us months of work by finding the solution and importing the
                                data. Bravo!'
			]
		]
	]
];