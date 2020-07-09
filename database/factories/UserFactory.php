<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'nik' => $faker->creditCardNumber,
        'nama_lengkap'=> $faker->name,
        'nama_panggilan'=> $faker->userName,
        'agama'=> $faker->word,
        'jenis_kelamin'=> $faker->title,
        'tempat_tanggal_lahir'=> $faker->date,
        'no_hp'=> $faker->e164phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'alamat_ktp'=> $faker->address,
        'alamat_domisili'=> $faker->secondaryAddress,
        'jumlah_cuti' =>  $faker->randomDigitNotNull,
        'avatar' => $faker->imageUrl($width = 640, $height = 480),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
