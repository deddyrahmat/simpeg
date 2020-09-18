<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Edit Data Pangkat'; 
    //variabel yang berfungsi mengatifkan sidebar
    $pegawai = 'pegawai';
    // menambahkan style khusus untuk halaman ini saja
    $addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';

    // menghubungkan file header dengan file edit_pegawai
    // tentukan variabel yang akan dikirim sebagai nilai tambahan untuk memperjelas alamat file bahwa letak file tersebut ada disubfolder
    $sub = "../";
    require_once "../_template/_header.php";
    //simpan data id(nip) yang dikirim dari halaman pegawai ke dalam variabel nip
    $id = $_GET['id'];

    // paggil data keluarga pegawai berdasarkan id untuk ditampilkan di form sebelum melakukan perubahan data
    $data = query("SELECT * FROM pegawai INNER JOIN pangkat ON pegawai.nip=pangkat.nip WHERE id_pangkat='$id'");
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('pegawai') ?>">Data Pegawai</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Pangkat</li>
  </ol>
</nav>

<div class="card mb-4">
    <div class="card-body">
        <form method="POST" action="<?= base_url('_config/proses_pangkat') ?>?edit">
            <div class="form-group row">
                <label for="id" class="col-sm-3 col-form-label">Nama Pegawai</label>
                <div class="col-sm-9">
                    <input type="hidden" name="id" id="id" class="form-control" value="<?= $data[0]['id_pangkat'] ?>">
                    <input type="hidden" name="nip" id="nip" class="form-control" value="<?= $data[0]['nip'] ?>">
                    <input type="text" name="id2" id="id2" class="form-control" value="<?= ucwords($data[0]['nama_pegawai']) .' - '.$data[0]['nip'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="pangkat" class="col-sm-3 col-form-label">pangkat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="pangkat" id="pangkat" value="<?= $data[0]['nama_pangkat'] ?>" placeholder="Jabatan" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="jenis_pangkat" class="col-sm-3 col-form-label">Jenis Pangkat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="jenis_pangkat" id="jenis_pangkat" placeholder="jenis_pangkat" value="<?= $data[0]['jenis_pangkat'] ?>" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="tmt" class="col-sm-3 col-form-label">TMT</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" value="<?= $data[0]['tmt_pangkat'] ?>" name="tmt" placeholder="TMT" required>
                </div>
            </div>   
            <div class="form-group row">
                <label for="tgl_sah" class="col-sm-3 col-form-label">Tanggal Pengesahan SK</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" value="<?= $data[0]['sah_sk'] ?>" name="tgl_sah" placeholder="Tanggal Pengesahan SK" required>
                </div>
            </div>   
            <div class="form-group row">
                <label for="sah_sk" class="col-sm-3 col-form-label">Nama Pejabat Pengesah SK</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="sah_sk" value="<?= $data[0]['nama_pengesah_sk'] ?>" id="sah_sk" placeholder="Nama Pejabat Pengesah SK" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="no_sk" class="col-sm-3 col-form-label">No. SK</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="no_sk" id="no_sk" value="<?= $data[0]['no_sk'] ?>" placeholder="No. SK" required autocomplete="off">
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