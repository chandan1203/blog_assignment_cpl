<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Category_Post;
use App\Model;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Category_Post::class, function (Faker $faker) {
    return [
        'category_id' => Category::pluck('id')->random(),
        'post_id' => Post::pluck('id')->random()
    ];
});
