<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Edit Data Keluarga'; 
    //variabel yang berfungsi mengatifkan sidebar
    $pegawai = 'pegawai';
    // menambahkan style khusus untuk halaman ini saja
    $addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';

    // menghubungkan file header dengan file edit_pegawai
    // tentukan variabel yang akan dikirim sebagai nilai tambahan untuk memperjelas alamat file bahwa letak file tersebut ada disubfolder
    $sub = "../";
    require_once "../_template/_header.php";
    //simpan data id(nip) yang dikirim dari halaman pegawai ke dalam variabel nip
    $nik = $_GET['id'];

    // paggil data keluarga pegawai berdasarkan nik untuk ditampilkan di form sebelum melakukan perubahan data
    $data = query("SELECT * FROM pegawai INNER JOIN keluarga ON pegawai.nip=keluarga.nip WHERE nik='$nik'");
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('pegawai') ?>">Data Pegawai</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Keluarga</li>
  </ol>
</nav>

<div class="card mb-4">
    <div class="card-body">
        <form method="POST" action="<?= base_url('_config/proses_keluarga') ?>?edit">
            <div class="form-group row">
                <label for="nip" class="col-sm-3 col-form-label">Nama Pegawai</label>
                <div class="col-sm-9">
                    <input type="hidden" name="nip" id="nip" class="form-control" value="<?= $data[0]['nip'] ?>">
                    <input type="hidden" name="nik_awal" id="nik_awal" class="form-control" value="<?= $nik ?>">
                    <input type="text" name="nip2" id="nip2" class="form-control" value="<?= ucwords($data[0]['nama_pegawai']) .' - '.$data[0]['nip'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" value="<?= $data[0]['nik'] ?>" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?= ucwords($data[0]['nama_keluarga']) ?>" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="ttl" class="col-sm-3 col-form-label">Tempat/Tanggal Lahir</label>
                <div class="col">
                    <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= ucwords($data[0]['tempat_lahir']) ?>" required autocomplete="off">
                </div>
                <div class="col">
                    <input type="date" class="form-control" value="<?= $data[0]['tanggal_lahir'] ?>" name="tgl_lahir" placeholder="Tanggal Lahir" required>
                </div>
            </div>            
            <div class="form-group row">
                <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan</label>
                <div class="col-sm-9">
                    <select class="form-control" name="pendidikan" id="pendidikan" required autocomplete="off">
                        <option value="sd" <?= $data[0]['pendidikan'] == "sd" ? "selected" : null ?>>SD</option>
                        <option value="smp" <?= $data[0]['pendidikan'] == "smp" ? "selected" : null ?>>SMP</option>
                        <option value="sltp" <?= $data[0]['pendidikan'] == "sltp" ? "selected" : null ?>>SLTP</option>
                        <option value="slta" <?= $data[0]['pendidikan'] == "slta" ? "selected" : null ?>>SLTA</option>
                        <option value="d3" <?= $data[0]['pendidikan'] == "d3" ? "selected" : null ?>>D3</option>
                        <option value="s1" <?= $data[0]['pendidikan'] == "s1" ? "selected" : null ?>>S1</option>
                        <option value="s2" <?= $data[0]['pendidikan'] == "s2" ? "selected" : null ?>>S2</option>
                        <option value="s3" <?= $data[0]['pendidikan'] == "s3" ? "selected" : null ?>>S3</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="<?= ucwords($data[0]['pekerjaan']) ?>" placeholder="Pekerjaan" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="hubungan" class="col-sm-3 col-form-label">Hubungan</label>
                <div class="col-sm-9">
                    <select class="form-control" name="hubungan" id="hubungan" required autocomplete="off">
                        <option value="suami" <?= $data[0]['hubungan'] == "suami" ? "selected" : null ?>>Suami</option>
                        <option value="istri" <?= $data[0]['hubungan'] == "istri" ? "selected" : null ?>>Istri</option>
                        <option value="ayah" <?= $data[0]['hubungan'] == "ayah" ? "selected" : null ?>>Ayah</option>
                        <option value="ibu" <?= $data[0]['hubungan'] == "ibu" ? "selected" : null ?>>Ibu</option>
                        <option value="anak" <?= $data[0]['hubungan'] == "anak" ? "selected" : null ?>>Anak</option>
                    </select>
                </div>
            </div>

        <!-- disini tanda tempat form -->
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success float-right"><i class="fas fa-fw fa-save"></i> Simpan</button>
    </div>
    </form>
</div>


<?php

    $addscript = '
        <script src="'.asset('_assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js').'"></script>
        <script>
            $(".datepicker").datepicker()

            
        $(document).on("change", ".custom-file-input", function (event) {
            $(this).next(".custom-file-label").html(event.target.files[0].name);
            })    
        </script>
    ';

    // menghubungkan file footer dengan file edit_pegawai
    require_once "../_template/_footer.php";
?>