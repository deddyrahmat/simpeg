<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Edit Data Pendidikan'; 
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
    $data = query("SELECT * FROM pegawai INNER JOIN pendidikan ON pegawai.nip=pendidikan.nip WHERE id_pendidikan='$id'");
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('pegawai') ?>">Data Pegawai</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Pendidikan</li>
  </ol>
</nav>

<div class="card mb-4">
    <div class="card-body">
        <form method="POST" action="<?= base_url('_config/proses_pendidikan') ?>?edit">
            <div class="form-group row">
                <label for="id" class="col-sm-3 col-form-label">Nama Pegawai</label>
                <div class="col-sm-9">
                    <input type="hidden" name="id" id="id" class="form-control" value="<?= $data[0]['id_pendidikan'] ?>">
                    <input type="hidden" name="nip" id="nip" class="form-control" value="<?= $data[0]['nip'] ?>">
                    <input type="text" name="id2" id="id2" class="form-control" value="<?= ucwords($data[0]['nama_pegawai']) .' - '.$data[0]['nip'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="tingkat" class="col-sm-3 col-form-label">Tingkat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="tingkat" id="tingkat" placeholder="Tingkat" value="<?= $data[0]['tingkat'] ?>" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="sekolah" class="col-sm-3 col-form-label">Nama Sekolah/Universitas</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="sekolah" id="sekolah" value="<?= $data[0]['nama_sekolah'] ?>" placeholder="Nama Sekolah/Universitas" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="lokasi" class="col-sm-3 col-form-label">Lokasi</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi" value="<?= $data[0]['lokasi'] ?>" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="jurusan" class="col-sm-3 col-form-label">Jurusan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Jurusan" value="<?= $data[0]['jurusan'] ?>" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl" class="col-sm-3 col-form-label">Tanggal Ijazah</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="tgl" value="<?= $data[0]['tgl_ijazah'] ?>" placeholder="Tanggal Ijazah" required>
                </div>
            </div>   
            <div class="form-group row">
                <label for="no_ijazah" class="col-sm-3 col-form-label">No. Ijazah</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="no_ijazah" id="no_ijazah" value="<?= $data[0]['no_ijazah'] ?>" placeholder="No Ijazah" required autocomplete="off">
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