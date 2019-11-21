<?php

return [

    'config' => [
        'leading_cf_field_pattern' => '__cf__'
    ],

    'User' => [

        'street' => [

            'name' => 'street',
            'type' => 'text',
            'content_type' => 'text/plain',
            'caption' => __('yabe::custom_field.user.street.caption'),
            'placeholder' => __('yabe::custom_field.user.street.placeholder'),
            'showInTable' => false,

        ],

    ],

];
