<?php
    $addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';
    require_once "_template/_header.php";
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Data Pendidikan</li>
  </ol>
</nav>

<div class="card mb-4">
    <div class="card-body">
        <form method="POST" action="<?= base_url('_config/proses_pendidikan') ?>?add">
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
                <label for="tingkat" class="col-sm-3 col-form-label">Tingkat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="tingkat" id="tingkat" placeholder="Tingkat" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="sekolah" class="col-sm-3 col-form-label">Nama Sekolah/Universitas</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="sekolah" id="sekolah" placeholder="Nama Sekolah/Universitas" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="lokasi" class="col-sm-3 col-form-label">Lokasi</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="jurusan" class="col-sm-3 col-form-label">Jurusan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Jurusan" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl" class="col-sm-3 col-form-label">Tanggal Ijazah</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" name="tgl" placeholder="Tanggal Ijazah" required>
                </div>
            </div>   
            <div class="form-group row">
                <label for="no_ijazah" class="col-sm-3 col-form-label">No. Ijazah</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="no_ijazah" id="no_ijazah" placeholder="No Ijazah" required autocomplete="off">
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
        </script>
    ';
    require_once "_template/_footer.php";
?>