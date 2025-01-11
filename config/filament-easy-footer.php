<?php

return [
    'app_name' => env('APP_NAME', 'Takakori'),
    'github' => [
        'repository' => env('GITHUB_REPOSITORY', 'https://github.com/milon/takakori'),
        'token' => env('GITHUB_TOKEN', ''),
        'cache_ttl' => env('GITHUB_CACHE_TTL', 3600),
    ],
];
