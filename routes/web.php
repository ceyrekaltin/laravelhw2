<?php

use Illuminate\Support\Facades\Route;

Route::get('/planets', function () {
    $planets = [
        [
            'name' => 'Mars',
            'description' => 'Mars is the fourth planet from the Sun and the second-smallest planet in the Solar System, being larger than only Mercury.'
        ],
        [
            'name' => 'Venus',
            'description' => 'Venus is the second planet from the Sun. It is named after the Roman goddess of love and beauty.'
        ],
        [
            'name' => 'Earth',
            'description' => 'Our home planet is the third planet from the Sun, and the only place we know of so far that’s inhabited by living things.'
        ],
        [
            'name' => 'Jupiter',
            'description' => 'Jupiter is a gas giant and doesn’t have a solid surface, but it may have a solid inner core about the size of Earth.'
        ],
    ];

    return view('planets.index', ['planets' => $planets]);
});

Route::get('/planets/{planet}', function ($planet) {
    $planets = [
        'mars' => [
            'name' => 'Mars',
            'description' => 'Mars is the fourth planet from the Sun and the second-smallest planet in the Solar System, being larger than only Mercury.'
        ],
        'venus' => [
            'name' => 'Venus',
            'description' => 'Venus is the second planet from the Sun. It is named after the Roman goddess of love and beauty.'
        ],
        'earth' => [
            'name' => 'Earth',
            'description' => 'Our home planet is the third planet from the Sun, and the only place we know of so far that’s inhabited by living things.'
        ],
        'jupiter' => [
            'name' => 'Jupiter',
            'description' => 'Jupiter is a gas giant and doesn’t have a solid surface, but it may have a solid inner core about the size of Earth.'
        ],
    ];

    $planet = strtolower($planet);

    if (!array_key_exists($planet, $planets)) {
        abort(404, 'Planet not found');
    }

    return view('planets.detail', ['planet' => $planets[$planet]]);
});
