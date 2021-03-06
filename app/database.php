<?php
    /*
     * Options (mysql, sqllite)
     *
     * */
    return [
            'driver' => 'mysql',
            'sqlite' => [
                    'host'      => 'database.db',
                    'charset'   => 'utf8',
                    'collation' => 'ut8_unicode_ci'
            ],
            'mysql' => [
                    'host'      => 'localhost',
                    'database'  => 'bd_pessoa',
                    'user'      => 'root',
                    'pass'      => '',
                    'charset'   => 'utf8',
                    'collation' => 'ut8_unicode_ci',
                    'port'      => ''
            ]
    ];

