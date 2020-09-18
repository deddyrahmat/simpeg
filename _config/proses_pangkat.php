<?php

    require_once "config.php";

    if (isset($_GET['add']) ) {
        $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
        $pangkat = strip_tags($_POST['pangkat']);
        $jenis_pangkat = strip_tags($_POST['jenis_pangkat']);
        $tmt = strip_tags($_POST['tmt']);
        $tgl_sah = strip_tags($_POST['tgl_sah']);
        $sah_sk = strip_tags($_POST['sah_sk']);
        $no_sk = strip_tags($_POST['no_sk']);

        $create = create("INSERT INTO pangkat VALUES ('','$nip','$pangkat','$jenis_pangkat','$tmt','$tgl_sah','$sah_sk','$no_sk','nonaktif')");
        if(mysqli_affected_rows($koneksi) > 0) { 
            echo '<script>
            alert("Data Berhasil Ditambah")
            window.location = "'.base_url('pangkat').'";
            </script>';                     
        }
        else{
            echo '<script>
            alert("Data Gagal Ditambah")
            window.location = "'.base_url('pangkat').'";
            </script>';  
        }
    }elseif (isset($_GET['edit'])) {
        $id = mysqli_real_escape_string($koneksi, $_POST['id']);
        $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
        $pangkat = strip_tags($_POST['pangkat']);
        $jenis_pangkat = strip_tags($_POST['jenis_pangkat']);
        $tmt = strip_tags($_POST['tmt']);
        $tgl_sah = strip_tags($_POST['tgl_sah']);
        $sah_sk = strip_tags($_POST['sah_sk']);
        $no_sk = strip_tags($_POST['no_sk']);

        $update = update("UPDATE pangkat SET nama_pangkat='$pangkat',jenis_pangkat='$jenis_pangkat',tmt_pangkat='$tmt',sah_sk='$tgl_sah',nama_pengesah_sk='$sah_sk',no_sk='$no_sk' WHERE id_pangkat='$id' ");
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
    }elseif (isset($_GET['set'])) {
        $id = $_GET['id'];
        $nip = $_GET['nip'];

        // lakukan pengecekan status pangkat yang aktif dan berdasqarkan nip pegawai yang bersangkutan
        $cek = mysqli_query($koneksi,"SELECT * FROM pangkat WHERE nip='$nip' and status_pangkat='aktif'");
        // apakah hasil pengecekan adalah 0, jika iya maka artonya seluruh data masih nonaktif dan ubah menjadi aktif sesuai dengan id pangkat yang dipilih
        if (mysqli_num_rows($cek) == 0) {
            $update = update("UPDATE pangkat SET status_pangkat='aktif' WHERE id_pangkat='$id' ");
            echo '<script>
            alert("Data Berhasil Diperbarui")
            window.location = "'.base_url('detail_pegawai').'?id='.$nip.'";
            </script>';
        }
        // jika sudah ada satu data yang statusnya aktif, maka nonaktifkan dulu semua status yang ada didpegawai tersebut lalu aktifkan sesuai yang diinginkan
        elseif (mysqli_num_rows($cek) == 1) {
            $update = update("UPDATE pangkat SET status_pangkat='nonaktif' WHERE nip='$nip' ");
            
            if ($update) {
                $update2 = update("UPDATE pangkat SET status_pangkat='aktif' WHERE id_pangkat='$id' ");
                echo '<script>
                alert("Data Berhasil Diperbarui")
                window.location = "'.base_url('detail_pegawai').'?id='.$nip.'";
                </script>';
            }else{
                echo '<script>
                alert("Data Gagal23 Diperbarui")
                window.location = "'.base_url('detail_pegawai').'?id='.$nip.'";
                </script>';
            }
        }else{
            echo '<script>
            alert("Data Gagal Diperbarui")
            window.location = "'.base_url('detail_pegawai').'?id='.$nip.'";
            </script>';        
        }
    }