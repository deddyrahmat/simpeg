<?php

    require_once "config.php";

    if (isset($_GET['add']) ) {
        $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
        $tingkat = strip_tags($_POST['tingkat']);
        $sekolah = strip_tags($_POST['sekolah']);
        $lokasi = strip_tags($_POST['lokasi']);
        $jurusan = strip_tags($_POST['jurusan']);
        $tgl = strip_tags($_POST['tgl']);
        $no_ijazah = strip_tags($_POST['no_ijazah']);

        $create = create("INSERT INTO pendidikan VALUES ('','$nip','$tingkat','$sekolah','$lokasi','$jurusan','$tgl','$no_ijazah')");
        if(mysqli_affected_rows($koneksi) > 0) { 
            echo '<script>
            alert("Data Berhasil Ditambah")
            window.location = "'.base_url('pendidikan').'";
            </script>';                     
        }
        else{
            echo '<script>
            alert("Data Gagal Ditambah")
            window.location = "'.base_url('pendidikan').'";
            </script>';  
        }
    }elseif (isset($_GET['edit'])) {
        $id = mysqli_real_escape_string($koneksi, $_POST['id']);
        $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
        $tingkat = strip_tags($_POST['tingkat']);
        $sekolah = strip_tags($_POST['sekolah']);
        $lokasi = strip_tags($_POST['lokasi']);
        $jurusan = strip_tags($_POST['jurusan']);
        $tgl = strip_tags($_POST['tgl']);
        $no_ijazah = strip_tags($_POST['no_ijazah']);  

        $update = update("UPDATE pendidikan SET tingkat='$tingkat',nama_sekolah='$sekolah',lokasi='$lokasi',jurusan='$jurusan',tgl_ijazah='$tgl',no_ijazah='$no_ijazah' WHERE id_pendidikan='$id' ");
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