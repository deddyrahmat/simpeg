<?php
  //variabel yang berfungsi menyimpan detail dari sub judul website
  $nama = 'Dashboard'; 
  //variabel yang berfungsi mengatifkan sidebar
  $dashboard = "dashboard";

  // menghubungkan file header dengan file dashboard
  require_once "_template/_header.php";
?>

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
  </nav>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pegawai</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $total = query("SELECT COUNT('nip') as total FROM pegawai"); echo $total[0]['total']; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total PNS</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $total = query("SELECT COUNT('nip') as total FROM pegawai WHERE status_kepegawaian = 'pns'"); echo $total[0]['total']; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Honor</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $total = query("SELECT COUNT('nip') as total FROM pegawai WHERE status_kepegawaian = 'honor'"); echo $total[0]['total']; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
  // menghubungkan file footer dengan file dashboard
  require_once "_template/_footer.php";
?>