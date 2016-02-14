<?php

return array(
	'password' => array(
		'not_empty'  => 'Please choose a password',
		'min_length' => 'Password must be at least :param2 characters long',
	),
    'password_confirm' => array(
        'matches' => 'The password fields did not match.',
    ),
);