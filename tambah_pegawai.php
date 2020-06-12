<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Tambah Pegawai'; 
    //variabel yang berfungsi mengatifkan sidebar
    $pegawai = 'pegawai';
    // menambahkan style khusus untuk halaman ini saja
    $addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';
    // menghubungkan file header dengan file tambah Pegawai
    require_once "_template/_header.php";
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('pegawai') ?>">Data Pegawai</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah</li>
  </ol>
</nav>

<div class="card mb-4">
    <div class="card-body">
        <form method="POST" action="<?= base_url('_config/proses_pegawai') ?>?add" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP" required autocomplete="off" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_pegawai" class="col-sm-3 col-form-label">Nama Pegawai</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" placeholder="Nama Pegawai" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="ttl" class="col-sm-3 col-form-label">Tempat/Tanggal Lahir</label>
                <div class="col">
                    <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" required autocomplete="off">
                </div>
                <div class="col">
                    <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" name="tgl_lahir" placeholder="Tanggal Lahir" required>
                </div>
            </div>
            <fieldset class="form-group">
                <div class="row">
                <legend class="col-form-label col-sm-3 pt-0">Jenis Kelamin</legend>
                <div class="col-sm-9">
                    <div class="form-check d-inline mr-3">
                        <input class="form-check-input" type="radio" name="jk" id="jk1" value="laki-laki" checked>
                        <label class="form-check-label" for="jk1">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check d-inline">
                        <input class="form-check-input" type="radio" name="jk" id="jk2" value="perempuan">
                        <label class="form-check-label" for="jk2">
                            Perempuan
                        </label>
                    </div>
                </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <label for="no_hp" class="col-sm-3 col-form-label">Nomor Handphone</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor Handphone" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="agama" id="agama" placeholder="Agama" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                    <textarea name="alamat" class="form-control" id="alamat" cols="10" rows="3" placeholder="Alamat Lengkap" required autocomplete="off"></textarea>
                </div>
            </div>
            <fieldset class="form-group">
                <div class="row">
                <legend class="col-form-label col-sm-3 pt-0">Golongan Darah</legend>
                    <div class="col-sm-9">
                        <div class="form-check d-inline mr-3">
                            <input class="form-check-input" type="radio" name="goldarah" id="goldarah1" value="a" checked>
                            <label class="form-check-label" for="goldarah1">
                                A
                            </label>
                        </div>
                        <div class="form-check d-inline mr-3">
                            <input class="form-check-input" type="radio" name="goldarah" id="goldarah2" value="b">
                            <label class="form-check-label" for="goldarah2">
                                B
                            </label>
                        </div>
                        <div class="form-check d-inline mr-3">
                            <input class="form-check-input" type="radio" name="goldarah" id="goldarah2" value="ab">
                            <label class="form-check-label" for="goldarah2">
                                AB
                            </label>
                        </div>
                        <div class="form-check d-inline mr-3">
                            <input class="form-check-input" type="radio" name="goldarah" id="goldarah3" value="o">
                            <label class="form-check-label" for="goldarah3">
                                O
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <label for="stat_nikah" class="col-sm-3 col-form-label">Status Pernikahan</label>
                <div class="col-sm-9">
                    <select class="form-control" name="stat_nikah" id="stat_nikah" required autocomplete="off">
                        <option value="lajang">Lajang</option>
                        <option value="kawin">Menikah</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="stat_pegawai" class="col-sm-3 col-form-label">Status Kepegawaian</label>
                <div class="col-sm-9">
                    <select class="form-control" name="stat_pegawai" id="stat_pegawai" required autocomplete="off">
                        <option value="pns">PNS</option>
                        <option value="honor">Honor</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="nip" class="col-sm-3 col-form-label">Pas Photo</label>
                <div class="col-sm-9">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="foto" required>
                        <label class="custom-file-label" for="customFile">Tentukan file</label>
                    </div>
                    <span class="text-info">* Maksimal Ukuran File 1 MB</span>
                </div>
            </div>

        <!-- disini tanda tempat form -->
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success float-right"><i class="fas fa-fw fa-save"></i> Simpan</button>
        <a href="<?= base_url('pegawai') ?>" class="btn btn-warning"><i class="fas fa-fw fa-chevron-left"></i> Kembali</a>
    </div>
    </form>
</div>


<?php

    // menambahkan script khusus untuk halaman ini saja
    $addscript = '
        <script src="'.asset('_assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js').'"></script>
        <script>
            $(".datepicker").datepicker()

            
        $(document).on("change", ".custom-file-input", function (event) {
            $(this).next(".custom-file-label").html(event.target.files[0].name);
            })    
        </script>
    ';
    // menghubungkan file footer dengan file tambah Pegawai
    require_once "_template/_footer.php";
?>