<?php
return [
    'role' => [
        [

            'name' => 'admin',
            'alias' => 'Admin',
        ],
        [

            'name' => 'user',
            'alias' => 'User',
        ],
    ],
    'user' => [
            'username' => 'admin',
            'fullname' => 'Admin Admin',
            'auth_key' => 'i39l233DX1UIhOPM5p9_uYu4P2n-jYdH',
            'password_hash' => Yii::$app->security->generatePasswordHash('pfs222'),
        'email' => 'info@protrader.org',
            'role' => 1, // Admin
            'status' => 1, // Active
            'created_at' => date('U'),
            'updated_at' => date('U')
        ],



    'user_profile' => [
            'user_id' => 1,
            'first_name' => 'Admin',
            'last_name' => 'PFSOFT',
    ],

    'lang' => [
        [
            'name' => 'english',
            'alias' => 'en-US',
        ],
        [
            'name' => 'russian',
            'alias' => 'ru-RU',
        ],
    ],

    'pages' => [
        [
            'title' => 'articles',
            'alias' => 'articles',
            'content' => 'articles',
        ],
        [
            'title' => 'brokers',
            'alias' => 'brokers',
            'content' => 'articles',
        ],
        [
            'title' => 'features',
            'alias' => 'features',
            'content' => 'articles',
        ],
        [
            'title' => 'forum',
            'alias' => 'forum',
            'content' => 'articles',
        ],
        [
            'title' => 'faq',
            'alias' => 'faq',
            'content' => 'articles',
        ],

        [
            'title' => 'news',
            'alias' => 'news',
            'content' => 'articles',
        ],
    ],
];
