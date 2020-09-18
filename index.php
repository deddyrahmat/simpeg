<?php
    require_once "_config/config.php";

    // cek cookie use
    if (isset($_COOKIE['id']) && isset($_COOKIE['value'])) {
        $id = $_COOKIE['id'];
        $value = $_COOKIE['value'];

        // tangkap data username berdasarkan id yang ada di cookie
        $result = query("SELECT * FROM user WHERE md5(id_user) = '$id' ");

        // cek username dari hasil query diatas dengan data dari variabel value\
        if ($value === hash('md5', $result[0]['username'])) {
            $_SESSION['login'] = 'true';
            $_SESSION['id_user'] = $result[0]['id_user'];
        }

    }

    // jika sudah ada user yang login
    if (isset($_SESSION['login'])) {
        header("location:".base_url('dashboard'));
    }else{
        header("location:".base_url('login'));
    }