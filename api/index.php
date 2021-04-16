<?php

// use autoloader instead!
require_once(__DIR__ . '/connect.php');
require_once(__DIR__ . '/users.php');

if (isset($_GET['url'])) {

    $urlSplit = explode('/', $_GET['url']);

    if ($urlSplit[0] == 'users') {

        $connect = new Connect;
        $users   = new Users($connect);
        $id      = false;

        if (isset($urlSplit[1]) && is_numeric($urlSplit[1])) {
            $id = $urlSplit[1];
        }

        echo $users->select($id);

    }

} else {
    echo 'not found';
}