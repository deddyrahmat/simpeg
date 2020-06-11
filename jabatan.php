<?php
    $addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';
    require_once "_template/_header.php";
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Data Jabatan</li>
  </ol>
</nav>

<div class="card mb-4">
    <div class="card-body">
        <form method="POST" action="<?= base_url('_config/proses_jabatan') ?>?add">
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
                <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="eselon" class="col-sm-3 col-form-label">Eselon</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="eselon" id="eselon" placeholder="Eselon" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="tmt" class="col-sm-3 col-form-label">TMT</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" name="tmt" placeholder="TMT" required>
                </div>
            </div>   
            <div class="form-group row">
                <label for="sampai_tgl" class="col-sm-3 col-form-label">Sampai Tanggal</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" name="sampai_tgl" placeholder="Tanggal Ijazah" required>
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