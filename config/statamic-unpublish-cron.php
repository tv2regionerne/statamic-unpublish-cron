<?php
return [
    'enabled' => env('UNPUBLISH_CRON_ENABLED', true),
    'collections' => [
        /*
         * Define the collection as the key and the datetime field handle as the value
         */
        'articles' => 'unpublish_date',
    ],
];
