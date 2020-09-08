<?php

return [
    // accepted values are left | center | right
    'default_x_position' => 'right',

    // accepted values are top | center | bottom
    'default_y_position' => 'top',

    // in milliseconds (1000 is 1s, 0 for indefinite duration)
    'default_duration' => '2600',

    // whether it can be dismissed by default
    'default_dismissable_state' => false,

    // allowed notification types
    'types' => [
        'success', 'error', 'warning', 'info',
    ],

    // will allow translation strings to be used
    'use_translation_strings' => false,
];
