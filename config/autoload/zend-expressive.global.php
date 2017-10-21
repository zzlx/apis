<?php

return [
    'debug' => false,
    'config_cache_enabled' => true,
    'zend-expressive' => [
        'raise_throwables' => false,
        'error_handler' => [
            'template_404'   => 'error::404',
            'template_error' => 'error::error',
        ],
    ],
];

