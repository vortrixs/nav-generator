<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

define('DIRECTORY_ROOT', 'path/');

require_once 'NavGenerator.php';

$data = [
    [
        'id' => 1,
        'title' => 'Home',
        'url' => 'home',
        'parent_id' => 0
    ],
    [
        'id' => 2,
        'title' => 'News from Scandinavia',
        'url' => 'news-from-dk',
        'parent_id' => 0
    ],
    [
        'id' => 3,
        'title' => 'News from Denmark',
        'url' => 'news-from-dk',
        'parent_id' => 2
    ],
    [
        'id' => 4,
        'title' => 'News from Sweden',
        'url' => 'news-from-dk',
        'parent_id' => 2
    ],
    [
        'id' => 5,
        'title' => 'News from Norway',
        'url' => 'news-from-dk',
        'parent_id' => 2
    ],
    [
        'id' => 6,
        'title' => 'News from Fyn',
        'url' => 'news-from-dk',
        'parent_id' => 3
    ],
    [
        'id' => 7,
        'title' => 'News from Sjælland',
        'url' => 'news-from-dk',
        'parent_id' => 3
    ],
    [
        'id' => 8,
        'title' => 'News from Jylland',
        'url' => 'news-from-dk',
        'parent_id' => 3
    ],
    [
        'id' => 9,
        'title' => 'News from Odense',
        'url' => 'news-from-dk',
        'parent_id' => 6
    ],
    [
        'id' => 10,
        'title' => 'News from København',
        'url' => 'news-from-dk',
        'parent_id' => 7
    ],
    [
        'id' => 11,
        'title' => 'News from Århus',
        'url' => 'news-from-dk',
        'parent_id' => 8
    ],
    [
        'id' => 12,
        'title' => 'test',
        'url' => 'test',
        'parent_id' => 3
    ],    [
        'id' => 13,
        'title' => 'test',
        'url' => 'test',
        'parent_id' => 0
    ],    [
        'id' => 14,
        'title' => 'test',
        'url' => 'test',
        'parent_id' => 4
    ],    [
        'id' => 15,
        'title' => 'test',
        'url' => 'test',
        'parent_id' => 12
    ],    [
        'id' => 16,
        'title' => 'test',
        'url' => 'test',
        'parent_id' => 5
    ],    [
        'id' => 16,
        'title' => 'test',
        'url' => 'test',
        'parent_id' => 5
    ],
];

$navgen = new NavGenerator($data);

echo $navgen->run(__DIR__);