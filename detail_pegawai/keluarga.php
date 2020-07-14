<?php
require_once "../_config/config.php";
$nip = $_GET['nip'];
$data_keluarga = query("SELECT * FROM keluarga WHERE nip='$nip' ORDER BY hubungan");
$_SESSION['func'] = $_GET['func'];
?>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tempat Tanggal Lahir</th>
                <th>Pendidikan</th>
                <th>Pekerjaan</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($data_keluarga as $keluarga) :
            ?>
                <tr>
                    <td><?= ucwords($keluarga['nik']) ?></td>
                    <td><?= ucwords($keluarga['nama_keluarga']) ?></td>
                    <td><?= ucwords($keluarga['tempat_lahir']) . ', ' . date('d-m-Y',strtotime($keluarga['tanggal_lahir'])) ?></td>
                    <td><?= ucwords($keluarga['pendidikan']) ?></td>
                    <td><?= ucwords($keluarga['pekerjaan']) ?></td>
                    <td><?= ucwords($keluarga['hubungan']) ?></td>
                    <td>
                        <a href="<?= base_url('detail_pegawai/edit_keluarga') ?>?id=<?= $keluarga['nik'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>