<?php
    require_once"_config/config.php";
    // jika sudah ada user yang login
    if (isset($_SESSION['login'])) {
        header("location:".base_url('dashboard'));
    }else{
        header("location:".base_url('login'));
    }