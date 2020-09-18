<?php
$data_pangkat = query("SELECT * FROM pangkat WHERE nip='$nip' ORDER BY tmt_pangkat");
?>
<div class="table-responsive mt-3">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nama pangkat</th>
                <th>Jenis Pangkat</th>
                <th>TMT</th>
                <th>Sah SK</th>
                <th>Nama Pengesah SK</th>
                <th>No SK</th>
                <th>Status pangkat</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($data_pangkat as $pangkat) :
            ?>
                <tr>
                    <td><?= ucwords($pangkat['nama_pangkat']) ?></td>
                    <td><?= ucwords($pangkat['jenis_pangkat']) ?></td>
                    <td><?= date('d-m-Y',strtotime($pangkat['tmt_pangkat'])) ?></td>
                    <td><?= date('d-m-Y',strtotime($pangkat['sah_sk'])) ?></td>
                    <td><?= ucwords($pangkat['nama_pengesah_sk']) ?></td>
                    <td><?= ucwords($pangkat['no_sk']) ?></td>
                    <td><?= ucwords($pangkat['status_pangkat']) ?></td>
                    <td>
                        <a href="<?= base_url('detail_pegawai/edit_pangkat') ?>?id=<?= $pangkat['id_pangkat'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                        <a href="<?= base_url('_config/proses_pangkat') ?>?set&id=<?= $pangkat['id_pangkat'] ?>&nip=<?= $nip ?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Setup</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>