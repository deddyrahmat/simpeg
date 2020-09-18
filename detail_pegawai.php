<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Detail Pegawai'; 
    //variabel yang berfungsi mengatifkan sidebar
    $pegawai = 'pegawai';

    // menghubungkan file header dengan file detail Pegawai
    require_once "_template/_header.php";

    //simpan data id(nip) yang dikirim dari halaman pegawai ke dalam variabel nip
    $nip = $_GET['id'];

    // letakkan kondisi function yang diinginkan
    // tentukan variabel yang akan digunakan untuk menyimpan data function penghubung kehalaman. defualt halaman yaitu profile
    // cek data function yang dikirim dari halaman sebelumnya untuk menampilkan detail data pegawai yang diinginkan
    if (isset($_SESSION['func'])) {
        $func = $_SESSION['func'];
    }else{
        $func = "link_profil";
    }
    

    // lakukan filter data berdasarkan nip yang telah ditangkap divariabel nip dan jalankan function query
    // simpan hasil query kedalam variabel data_detail
    $data_detail = query("SELECT * FROM pegawai WHERE nip='$nip'");
        
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('pegawai') ?>">Data Pegawai</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Pegawai</li>
    </ol>
</nav>

<!-- DataTales Example -->
<div class="row">
    <div class="col-md-4">
        <div class="card shadow mb-4 border-left-primary">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?= asset('_assets/img/').$data_detail[0]['foto_pegawai']; ?>" class="img-fluid shadow" alt="Foto Pegawai">
                    <h2 class="mt-3"><?= ucwords($data_detail[0]['nama_pegawai']) ?></h2>
                    <span class="text-muted"><?= $data_detail[0]['nip'] ?></span>
                </div>
                <hr>
                <span class="text-info"><i class="fas fa-phone"></i></span>
                <span class="text-info float-right"><?= $data_detail[0]['nip'] ?></span>
                <hr>
                <span class="text-info"><i class="fas fa-envelope"></i></span>
                <span class="text-info float-right"><?= $data_detail[0]['email'] ?></span>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow mb-4 border-bottom-primary">
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab">
                        <a class="nav-item nav-link" id="nav-profil-tab" data-toggle="tab" href="#nav-profil" role="tab">Profil</a>
                        <a class="nav-item nav-link" id="nav-keluarga-tab" data-toggle="tab" href="#nav-keluarga" role="tab">Keluarga</a>
                        <a class="nav-item nav-link" id="nav-pendidikan-tab" data-toggle="tab" href="#nav-pendidikan" role="tab">Pendidikan</a>
                        <a class="nav-item nav-link" id="nav-jabatan-tab" data-toggle="tab" href="#nav-jabatan" role="tab">Jabatan</a>
                        <a class="nav-item nav-link" id="nav-pangkat-tab" data-toggle="tab" href="#nav-pangkat" role="tab">Pangkat</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-profil" role="tabpanel">
                        <?php
                            require_once "detail_pegawai/profil.php";
                        ?>
                    </div>
                    <div class="tab-pane fade" id="nav-keluarga" role="tabpanel">
                    <?php
                        require_once "detail_pegawai/keluarga.php";
                    ?>
                    </div>
                    <div class="tab-pane fade" id="nav-pendidikan" role="tabpanel">
                    <?php
                        require_once "detail_pegawai/pendidikan.php";
                    ?>
                    </div>
                    <div class="tab-pane fade" id="nav-jabatan" role="tabpanel">
                    <?php
                        require_once "detail_pegawai/jabatan.php";
                    ?>
                    </div>
                    <div class="tab-pane fade" id="nav-pangkat" role="tabpanel">
                    <?php
                        require_once "detail_pegawai/pangkat.php";
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
    
    // menghubungkan file footer dengan file detail pegawai
    require_once "_template/_footer.php";
    
    
?>