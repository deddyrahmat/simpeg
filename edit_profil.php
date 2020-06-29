<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Profil Administrator'; 
    //variabel yang berfungsi mengatifkan sidebar
    $dashboard = "dashboard";

    // menghubungkan file header dengan file edit_pegawai
    require_once "_template/_header.php";
    //simpan data id(nip) yang dikirim dari halaman pegawai ke dalam variabel nip
    $id = $_SESSION['id_user'];

    // cari data user(administrator) menggunakan id user yang saat ini sedang login
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id'");
    // hasil dari proses result akan disimpan ke variabel data
    $data = mysqli_fetch_assoc($result);
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('index') ?>">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Profil</li>
  </ol>
</nav>

<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="card shadow">
            <div class="card-body">
                <form action="<?= base_url('_config/proses_profil') ?>?pass" method="post">
                    <div class="form-group row">
                        <label for="password_lama" class="col-sm-3 col-form-label">password Lama</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password_lama" id="password_lama" placeholder="Password Lama" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password_baru" class="col-sm-3 col-form-label">Password Baru</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password_baru" id="password_baru" placeholder="Password Baru" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password_baru2" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password_baru2" id="password_baru2" placeholder="Konfirmasi Password" required autocomplete="off">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-fw fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="card shadow">
            <div class="card-body">
                <form action="<?= base_url('_config/proses_profil') ?>?username" method="post">
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?= $data['username'] ?>" required autocomplete="off">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-fw fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
    // menghubungkan file footer dengan file edit_pegawai
    require_once "_template/_footer.php";
?>