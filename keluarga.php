<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Riwayat Keluarga'; 
    //variabel yang berfungsi mengatifkan sidebar
    $riwayat = 'riwayat';
    //variabel yang berfungsi mengatifkan sidebar
    $keluarga = 'keluarga';
    // menambahkan style khusus untuk halaman ini saja
    $addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';
    // menghubungkan file header dengan file keluarga
    require_once "_template/_header.php";
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Data Keluarga</li>
  </ol>
</nav>

<div class="card mb-4">
    <div class="card-body">
        <form method="POST" action="<?= base_url('_config/proses_keluarga') ?>?add">
            <div class="form-group row">
                <label for="nip" class="col-sm-3 col-form-label">Pilih Pegawai</label>
                <div class="col-sm-9">
                    <select class="form-control" name="nip" id="nip" required autocomplete="off" autofocus>
                        <?php
                            $data_pegawai=query("SELECT * FROM pegawai GROUP BY nama_pegawai asc");
                            foreach ($data_pegawai as $pegawai) : ?>
                                <option value="<?= $pegawai['nip'] ?>"><?= $pegawai['nama_pegawai'].' - '.$pegawai['nip'] ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" required autocomplete="off">
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
            <div class="form-group row">
                <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan</label>
                <div class="col-sm-9">
                    <select class="form-control" name="pendidikan" id="pendidikan" required autocomplete="off">
                        <option value="sd">SD</option>
                        <option value="smp">SMP</option>
                        <option value="sltp">SLTP</option>
                        <option value="slta">SLTA</option>
                        <option value="d3">D3</option>
                        <option value="s1">S1</option>
                        <option value="s2">S2</option>
                        <option value="s3">S3</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="hubungan" class="col-sm-3 col-form-label">Hubungan</label>
                <div class="col-sm-9">
                    <select class="form-control" name="hubungan" id="hubungan" required autocomplete="off">
                        <option value="suami">Suami</option>
                        <option value="istri">Istri</option>
                        <option value="ayah">Ayah</option>
                        <option value="ibu">Ibu</option>
                        <option value="anak kandung">Anak Kandung</option>
                        <option value="anak angkat">Anak Angkat</option>
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
    // menambahkan script khusus untuk halaman ini saja

    $addscript = '
        <script src="'.asset('_assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js').'"></script>
        <script>
            $(".datepicker").datepicker()
        </script>
    ';

    // menghubungkan file footer dengan file keluarga
    require_once "_template/_footer.php";
?>