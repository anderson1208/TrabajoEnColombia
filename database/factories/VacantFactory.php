<?php

use Faker\Generator as Faker;

$factory->define(App\Vacant::class, function (Faker $faker) {

	$areaWorks = App\AreaWork::all()->pluck('id');
	$workingDays = App\WorkingDay::all()->pluck('id');
	$contractTypes = App\ContractType::all()->pluck('id');
    return [
        'title'				=>	$faker->title,
        'description'		=>	$faker->text,
        'amount'			=>	$faker->numberBetween(1, 5),
        'salary'			=>	$faker->numberBetween(800000, 2500000),
        'expired_date'		=>	now()->addDays($faker->randomNumber(2)),
		'area_work_id'		=>	$faker->randomElement($areaWorks),
		'working_day_id'	=>	$faker->randomElement($workingDays),
		'contract_type_id'	=>	$faker->randomElement($contractTypes),
        'year_experiences'  =>  $faker->numberBetween(0, 3),
    ];
});
