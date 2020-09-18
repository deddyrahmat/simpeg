<?php
$data_pendidikan = query("SELECT * FROM pendidikan WHERE nip='$nip' ORDER BY tgl_ijazah");
?>
<div class="table-responsive mt-3">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Tingkat</th>
                <th>Nama Sekolah</th>
                <th>Lokasi</th>
                <th>Jurusan</th>
                <th>Tanggal Ijazah</th>
                <th>Nomor Ijazah</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($data_pendidikan as $pendidikan) :
            ?>
                <tr>
                    <td><?= ucwords($pendidikan['tingkat']) ?></td>
                    <td><?= ucwords($pendidikan['nama_sekolah']) ?></td>
                    <td><?= ucwords($pendidikan['lokasi']) ?></td>
                    <td><?= ucwords($pendidikan['jurusan']) ?></td>
                    <td><?= date('d-m-Y',strtotime($pendidikan['tgl_ijazah'])) ?></td>
                    <td><?= ucwords($pendidikan['no_ijazah']) ?></td>
                    <td>
                    <a href="<?= base_url('detail_pegawai/edit_pendidikan') ?>?id=<?= $pendidikan['id_pendidikan'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>