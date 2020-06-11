<?php
    $addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';
    require_once "_template/_header.php";
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Data Pangkat</li>
  </ol>
</nav>

<div class="card mb-4">
    <div class="card-body">
        <form method="POST" action="<?= base_url('_config/proses_pangkat') ?>?add">
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
                <label for="pangkat" class="col-sm-3 col-form-label">Pangkat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="pangkat" id="pangkat" placeholder="Pangkat" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="jenis_pangkat" class="col-sm-3 col-form-label">Jenis Pangkat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="jenis_pangkat" id="jenis_pangkat" placeholder="Jenis Pangkat" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="tmt" class="col-sm-3 col-form-label">TMT</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" name="tmt" placeholder="TMT" required>
                </div>
            </div>   
            <div class="form-group row">
                <label for="tgl_sah" class="col-sm-3 col-form-label">Tanggal Pengesahan SK</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" name="tgl_sah" placeholder="Tanggal Pengesahan SK" required>
                </div>
            </div>   
            <div class="form-group row">
                <label for="sah_sk" class="col-sm-3 col-form-label">Nama Pejabat Pengesah SK</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="sah_sk" id="sah_sk" placeholder="Nama Pejabat Pengesah SK" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="no_sk" class="col-sm-3 col-form-label">No. SK</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="no_sk" id="no_sk" placeholder="No. SK" required autocomplete="off">
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