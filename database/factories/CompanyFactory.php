<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
	$nit = "{$faker->randomNumber(6)}-{$faker->randomNumber(1)}";
    return [
        'name'				=>	$faker->company,
        'nit'				=>	$nit,
        'email'				=>	$faker->companyEmail,
        'password'			=> 	bcrypt('secret'),
        'address_id'		=>	factory(App\Address::class)->create()->id,
        'remember_token' 	=> 	str_random(10),
        'email_verified_at' => 	now(),
    ];
});
