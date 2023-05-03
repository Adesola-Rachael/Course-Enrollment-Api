

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Enums\CourseCategoryEnum;


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

$factory->define(App\Models\Course::class, function (Faker $faker) {

    $course = new CourseCategoryEnum;
    $course = $course->values();
    $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $subject = substr(str_shuffle($str_result), 0, 3);
    $course_code = $subject. ' ' .rand(100,999);
    return [
        'title' => $faker->name . ' '.'course',
        'category' => $faker->randomElement($course),
        'course_code' => $course_code, 
        'text' => $faker->name,
    ];
});