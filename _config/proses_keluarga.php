<?php

    require_once "config.php";

    if (isset($_GET['add']) ) {
        $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
        $nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
        $nama_lengkap = strip_tags($_POST['nama_lengkap']);
        $tempat_lahir = strip_tags($_POST['tempat_lahir']);
        $tgl_lahir = strip_tags($_POST['tgl_lahir']);
        $pendidikan = strip_tags($_POST['pendidikan']);
        $pekerjaan = strip_tags($_POST['pekerjaan']);
        $hubungan = strip_tags($_POST['hubungan']);

        $create = create("INSERT INTO keluarga VALUES ('$nik','$nip','$nama_lengkap','$tempat_lahir','$tgl_lahir','$pendidikan','$pekerjaan','$hubungan')");
        if(mysqli_affected_rows($koneksi) > 0) { 
            echo '<script>
            alert("Data Berhasil Ditambah")
            window.location = "'.base_url('keluarga').'";
            </script>';                     
        }
        else{
            echo '<script>
            alert("Data Gagal Ditambah")
            window.location = "'.base_url('keluarga').'";
            </script>';  
        }
    }elseif (isset($_GET['edit'])) {
        $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
        $nik_awal = mysqli_real_escape_string($koneksi, $_POST['nik_awal']);
        $nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
        $nama_lengkap = strip_tags($_POST['nama_lengkap']);
        $tempat_lahir = strip_tags($_POST['tempat_lahir']);
        $tgl_lahir = strip_tags($_POST['tgl_lahir']);
        $pendidikan = strip_tags($_POST['pendidikan']);
        $pekerjaan = strip_tags($_POST['pekerjaan']);
        $hubungan = strip_tags($_POST['hubungan']);   

        $update = update("UPDATE keluarga SET nik='$nik',nama_keluarga='$nama_lengkap',tempat_lahir='$tempat_lahir',tanggal_lahir='$tgl_lahir',pendidikan='$pendidikan',pekerjaan='$pekerjaan',hubungan='$hubungan' WHERE nik='$nik_awal' ");
        if(mysqli_affected_rows($koneksi) > 0) { 
            echo '<script>
            alert("Data Berhasil Diperbarui")
            window.location = "'.base_url('detail_pegawai').'?id='.$nip.'";
            </script>';                     
        }
        else{
            echo '<script>
            alert("Data Gagal Diperbarui")
            window.location = "'.base_url('detail_pegawai').'?id='.$nip.'";
            </script>';  
        }
    }