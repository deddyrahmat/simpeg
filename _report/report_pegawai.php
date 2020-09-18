<?php
    include "../_config/config.php";
    require_once "../_assets/vendor/vendor/autoload.php";

    use Dompdf\Dompdf;

    $dompdf = new Dompdf();
    $nip = $_GET['id'];
    $pegawai = query("SELECT * FROM pegawai WHERE nip='$nip'");

    $content = '<center><h3>Data Pegawai</h3></center><hr/><br/>';
    $content .= '<table width="100%">
    <tr>
        <td align="center">
            <img src="../_assets/img/'.$pegawai[0]['foto_pegawai'].'" width="75px" height="113px" alt="profil">
        </td>
        <td>
            <table width="100%" cellspacing="0" cellpadding="3" border="0">
                <tr>
                    <th align="left">NIP</th>
                    <th> : </th>
                    <td> '.$pegawai[0]['nip'].' </td>
                </tr>
                <tr>
                    <th align="left">Nama Lengkap</th>
                    <th> : </th>
                    <td> '.ucwords($pegawai[0]['nama_pegawai']).' </td>
                </tr>
                <tr>
                <th align="left">Tempat, Tanggal Lahir</th>
                <th> : </th>
                <td> '.ucwords($pegawai[0]['tempat_lahir']).", ".date('d-m-Y',strtotime($pegawai[0]['tanggal_lahir'])).' </td>
                </tr>
                <tr>
                    <th align="left">Agama</th>
                    <th> : </th>
                    <td> '.ucwords($pegawai[0]['agama']).' </td>
                </tr>
                <tr>
                    <th align="left">Jenis Kelamin</th>
                    <th> : </th>
                    <td> '.ucwords($pegawai[0]['jenis_kelamin']).' </td>
                </tr>
                <tr>
                    <th align="left">Golongan Darah</th>
                    <th> : </th>
                    <td> '.strtoupper($pegawai[0]['gol_darah']).' </td>
                </tr>
                <tr>
                    <th align="left">Status Perkawinan</th>
                    <th> : </th>
                    <td> '.ucwords($pegawai[0]['status_pernikahan']).' </td>
                </tr>
                <tr>
                    <th align="left">Status Kepegawaian</th>
                    <th> : </th>
                    <td> '.ucwords($pegawai[0]['status_kepegawaian']).' </td>
                </tr>
                <tr>
                    <th align="left">Alamat</th>
                    <th> : </th>
                    <td> '.ucwords($pegawai[0]['alamat']).' </td>
                </tr>
                <tr>
                    <th align="left">Email</th>
                    <th> : </th>
                    <td> '.ucwords($pegawai[0]['email']).' </td>
                </tr>
                <tr>
                    <th align="left">No. HP</th>
                    <th> : </th>
                    <td> '.ucwords($pegawai[0]['no_hp']).' </td>
                </tr>
            </table>
        </td>
    </tr>
</table>';
    $content .= '
        <b>Data Keluarga</b>
        <table border="1" cellspacing="0" cellpadding="3" width="100%">
        <tr style="background-color:#ade8f4;">
        <th>No</th>
        <th>NIK</th>
        <th>Nama Lengkap</th>
        <th>Tempat, Tanggal Lahir</th>
        <th>Pendidikan</th>
        <th>Pekerjaan</th>
        <th>Status</th>
        </tr>';
        $no = 1;
        $keluarga = query("SELECT * FROM keluarga WHERE nip = '$nip' ORDER BY hubungan ");
        foreach ($keluarga as $all_keluarga ) {
        $content .= "<tr>
            <td>".$no."</td>
            <td>".$all_keluarga['nik']."</td>
            <td>".ucwords($all_keluarga['nama_keluarga'])."</td>
            <td>".ucwords($all_keluarga['tempat_lahir']).", ". date('d-m-Y',strtotime($all_keluarga['tanggal_lahir']))."</td>
            <td>".ucwords($all_keluarga['pendidikan'])."</td>
            <td>".ucwords($all_keluarga['pekerjaan'])."</td>
            <td>".ucwords($all_keluarga['hubungan'])."</td>
            </tr>";
        $no++;
        }
        $content .='</table>';
    $content .= '
        <br>
        <b>Data Pendidikan</b>
        <table border="1" cellspacing="0" cellpadding="3" width="100%">
        <tr style="background-color:#ade8f4;">
        <th>No</th>
        <th>Tingkat</th>
        <th>Nama Sekolah</th>
        <th>Lokasi</th>
        <th>Jurusan</th>
        <th>Tanggal Ijazah</th>
        <th>No. Ijazah</th>
        </tr>';
        $no = 1;
        $pendidikan = query("SELECT * FROM pendidikan WHERE nip = '$nip' ");
        foreach ($pendidikan as $all_pendidikan ) {
        $content .= "<tr>
            <td>".$no."</td>
            <td>".ucwords($all_pendidikan['tingkat'])."</td>
            <td>".ucwords($all_pendidikan['nama_sekolah'])."</td>
            <td>".ucwords($all_pendidikan['lokasi'])."</td>
            <td>".ucwords($all_pendidikan['jurusan'])."</td>
            <td>".date('d-m-Y',strtotime($all_pendidikan['tgl_ijazah']))."</td>
            <td>".$all_pendidikan['no_ijazah']."</td>
            </tr>";
        $no++;
        }
        $content .='</table>';
    $content .= '
        <br>
        <b>Data Jabatan</b>
        <table border="1" cellspacing="0" cellpadding="3" width="100%">
        <tr style="background-color:#ade8f4;">
        <th>No</th>
        <th>Nama Jabatan</th>
        <th>Eselon</th>
        <th>TMT</th>
        <th>Sampai Tgl</th>
        <th>Status Jabatan</th>
        </tr>';
        $no = 1;
        $jabatan = query("SELECT * FROM jabatan WHERE nip = '$nip' ");
        foreach ($jabatan as $all_jabatan ) {
        $content .= "<tr>
            <td>".$no."</td>
            <td>".ucwords($all_jabatan['nama_jabatan'])."</td>
            <td>".ucwords($all_jabatan['eselon'])."</td>
            <td>".date('d-m-Y',strtotime($all_jabatan['tmt']))."</td>
            <td>".date('d-m-Y',strtotime($all_jabatan['sampai_tgl']))."</td>
            <td>".ucwords($all_jabatan['status_jabatan'])."</td>
            </tr>";
        $no++;
        }
        $content .='</table>';
    $content .= '
        <br>
        <b>Data Pangkat</b>
        <table border="1" cellspacing="0" cellpadding="3" width="100%">
        <tr style="background-color:#ade8f4;">
        <th>No</th>
        <th>Nama Pangkat</th>
        <th>Jenis Pangkat</th>
        <th>TMT Pangkat</th>
        <th>Sah SK</th>
        <th>Nama Pengesah SK</th>
        <th>No. SK</th>
        <th>Status Pangkat</th>
        </tr>';
        $no = 1;
        $pangkat = query("SELECT * FROM pangkat WHERE nip = '$nip' ");
        foreach ($pangkat as $all_pangkat ) {
        $content .= "<tr>
            <td>".$no."</td>
            <td>".ucwords($all_pangkat['nama_pangkat'])."</td>
            <td>".ucwords($all_pangkat['jenis_pangkat'])."</td>
            <td>".date('d-m-Y',strtotime($all_pangkat['tmt_pangkat']))."</td>
            <td>".date('d-m-Y',strtotime($all_pangkat['sah_sk']))."</td>
            <td>".ucwords($all_pangkat['nama_pengesah_sk'])."</td>
            <td>".ucwords($all_pangkat['no_sk'])."</td>
            <td>".ucwords($all_pangkat['status_pangkat'])."</td>
            </tr>";
        $no++;
        }
        $content .='</table>';
    $content .= "</html>";

    $dompdf->loadHtml($content);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'potrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Ball_pegawai[0]ser
    $dompdf->stream("Data Pegawai.pdf",["Attachment" => false]);