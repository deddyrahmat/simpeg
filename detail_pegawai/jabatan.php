<?php
$data_jabatan = query("SELECT * FROM jabatan WHERE nip='$nip' ORDER BY tmt");
?>
<div class="table-responsive mt-3">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Jabatan</th>
                <th>Eselon</th>
                <th>TMT</th>
                <th>Sampai Tanggal</th>
                <th>Status Jabatan</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($data_jabatan as $jabatan) :
            ?>
                <tr>
                    <td><?= ucwords($jabatan['nama_jabatan']) ?></td>
                    <td><?= ucwords($jabatan['eselon']) ?></td>
                    <td><?= date('d-m-Y',strtotime($jabatan['tmt'])) ?></td>
                    <td><?= date('d-m-Y',strtotime($jabatan['sampai_tgl'])) ?></td>
                    <td><?= ucwords($jabatan['status_jabatan']) ?></td>
                    <td>
                        <a href="<?= base_url('detail_pegawai/edit_jabatan') ?>?id=<?= $jabatan['id_jabatan'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                        <a href="<?= base_url('_config/proses_jabatan') ?>?set&id=<?= $jabatan['id_jabatan'] ?>&nip=<?= $nip ?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Setup</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>