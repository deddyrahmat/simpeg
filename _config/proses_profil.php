<?php

    require_once "config.php";

    if (isset($_GET['username']) ) {
        $id_user = $_SESSION['id_user'];
        $username = strip_tags($_POST['username']);

        $query = update("UPDATE user SET username='$username' WHERE id_user='$id_user' ");

    }