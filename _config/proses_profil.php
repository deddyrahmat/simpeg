<?php

    require_once "config.php";

    if (isset($_GET['username']) ) {
        $id_user = $_SESSION['id_user'];
        $username = strip_tags($_POST['username']);

        update("UPDATE user SET username='$username' WHERE id_user='$id_user' ");
        if(mysqli_affected_rows($koneksi) > 0) { 
            echo '<script>alert("Data Berhasil Diperbarui")
                window.location = "' . base_url('edit_profil') . '";
                </script>';
            }
        else{
            echo '<script>alert("Data Gagal Diperbarui")
                window.location = "' . base_url('edit_profil') . '";
                </script>';
        }
        
    }else if(isset($_GET['pass'])) {
        $id_user = $_SESSION['id_user'];
        $password = $_POST['password_lama'];
        $password_new = $_POST['password_baru'];
        $password_conf = $_POST['password_baru2'];

        // cek username yang diinput oleh user tersedia dan sama dengan yang ada didatabase atua tidak
        $cek_user = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user='$id_user'");

        // cek lagi dengan fungsi mysqli_num_rows untuk melihat ada atau tidaknya data ditemukan, jika ditemukan maka akan menghasilkan nilai 1
        if (mysqli_num_rows($cek_user) > 0) {
            // simpan hasil cek user ke dalam variabel agar bisa digunakan untuk cek password
            $data_user = mysqli_fetch_assoc($cek_user);

            // melakukan verifikasi password yang diinputkan oleh user dan mencocokannya dengan password yang ada didatabase
            if (password_verify($password, $data_user['password'])) {

                if ($password_new === $password_conf) {
                    $password_update = password_hash($password_new, PASSWORD_DEFAULT);
                    update("UPDATE user SET password='$password_update' WHERE id_user='$id_user' ");
    
                    if(mysqli_affected_rows($koneksi) > 0) { 
                        echo '<script>alert("Data Berhasil Diperbarui")
                            window.location = "' . base_url('edit_profil') . '";
                            </script>';
                        }
                    else{
                        echo '<script>alert("Data Gagal Diperbarui")
                            window.location = "' . base_url('edit_profil') . '";
                            </script>';
                        }
                    }
                else{
                    echo '<script>alert("Konfirmasi Password Tidak Sesuai")
                        window.location = "' . base_url('edit_profil') . '";
                        </script>';
                    }
                    
            }
            else{
                echo '<script>alert("Password Lama Tidak Sesuai")
                    window.location = "' . base_url('edit_profil') . '";
                    </script>';
            }
        }else{
            echo '<script>alert("Data Tidak Ditemukan")
                window.location = "' . base_url('edit_profil') . '";
                </script>';
        }
    }