<?php 
include "koneksi.php";

if(isset($_POST['submit'])){
    // Menggunakan fungsi mysqli_real_escape_string untuk menghindari SQL Injection
    $nama_guru = mysqli_real_escape_string($conn, $_POST['nama_guru']);
    $nip = mysqli_real_escape_string($conn, $_POST['nip']);
    $mapel = mysqli_real_escape_string($conn, $_POST['mapel']);

    // Validasi NIP harus berupa angka
    if(!is_numeric($nip)){
        echo "NIP harus berupa angka.";
    } else {
        // Query SQL
        $sql = "INSERT INTO `tb_guru`(`id`,`nama_guru`, `nip`, `mapel`)
                VALUES (NULL,'$nama_guru','$nip','$mapel')";

        // Menjalankan query
        $result = mysqli_query($conn, $sql);

        // Memeriksa apakah query berhasil dijalankan
        if($result) {
            header("location: tambahguru.php?msg=new record created successfully");
            exit();
        } else {
            echo "Failed: " . mysqli_error($conn);
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
  </head>

  <body>
    <div class="container-fluid position-relative d-flex p-0">
      <!-- Spinner Start -->
      <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      <!-- Spinner End -->

      <!-- Sidebar Start -->
      <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>SMP NEGERI 1 MASOHI</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h4 class="mb-0">Admin</h4>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Data</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.php" class="dropdown-item">Data Guru</a>
                            <a href="typography.php" class="dropdown-item">Data Siswa</a>
                            <a href="element.php" class="dropdown-item">Data Pegawai</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-th me-2"></i>Tambah Data</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="tambahguru.php" class="dropdown-item">Tambah Data Guru</a>
                            <a href="tambahsiswa.php" class="dropdown-item">Tambah Data Siswa</a>
                            <a href="tambahkariawan.php" class="dropdown-item">Tambah Data Kariawan</a>
                        </div>
                    </div>
                    <a href="rekapabsen.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Absen Siswa</a>
                    <a href="tentang.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Tentang Sekolah</a>
                    <a href="sejarah.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Sejarah</a>

                </div>
            </nav>
        </div>
      <!-- Sidebar End -->

      <!-- Content Start -->
      <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
          <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
          </a>
          <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
          </a>
          <form class="d-none d-md-flex ms-4">
            <input class="form-control bg-dark border-0" type="search" placeholder="Search" />
          </form>
          <div class="navbar-nav align-items-center ms-auto">
            <div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-envelope me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Message</span>
              </a>
              <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">
                  <div class="d-flex align-items-center">
                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px" />
                    <div class="ms-2">
                      <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                      <small>15 minutes ago</small>
                    </div>
                  </div>
                </a>
                <hr class="dropdown-divider" />
                <a href="#" class="dropdown-item">
                  <div class="d-flex align-items-center">
                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px" />
                    <div class="ms-2">
                      <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                      <small>15 minutes ago</small>
                    </div>
                  </div>
                </a>
                <hr class="dropdown-divider" />
                <a href="#" class="dropdown-item">
                  <div class="d-flex align-items-center">
                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px" />
                    <div class="ms-2">
                      <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                      <small>15 minutes ago</small>
                    </div>
                  </div>
                </a>
                <hr class="dropdown-divider" />
                <a href="#" class="dropdown-item text-center">See all message</a>
              </div>
            </div>

            <div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px" />
                <span class="d-none d-lg-inline-flex">John Doe</span>
              </a>
              <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">My Profile</a>
                <a href="#" class="dropdown-item">Settings</a>
                <a href="#" class="dropdown-item">Log Out</a>
              </div>
            </div>
          </div>
        </nav>
        <!-- Navbar End -->

        <!-- Sale & Revenue Start -->
        <div class="container-fluid pt-4 px-4">
          <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
              <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                  <p class="mb-2">Jumlah Siswa</p>
                  <h6 class="mb-0">$1234</h6>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                  <p class="mb-2">Jumlah Guru</p>
                  <h6 class="mb-0">$1234</h6>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                  <p class="mb-2">Honorer</p>
                  <h6 class="mb-0">$1234</h6>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                  <p class="mb-2">Pekerja</p>
                  <h6 class="mb-0">$1234</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Sale & Revenue End -->

        <!-- Sales Chart Start -->

        <!-- Sales Chart End -->
            <div class="container-fluid pt-4 px-4">
                  <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Basic Form</h6>
                            <form action="" method="post">
                                <div class="mb-3">
                                  <label for="nama">Nama</label>
                                  <input type="text" class="form-control" name="nama_guru" placeholder="Masukkan Nama">
                                </div>
                                <div class="mb-3">
                                  <label for="nip">NIP</label>
                                  <input type="numerik" class="form-control" name="nip" placeholder="Masukkan Nip">
                                </div>
                                <div class="mb-3">
                                  <label for="mapel">Mata Pelajaran</label>
                                  <input type="text" class="form-control" name="mapel" placeholder="Masukan Mata Pelajaran">
                                </div>
                              <button type="submit" class="btn btn-success" name="submit">Kirim</button>
                              <a href="tambahguru.php" class="btn btn-success">cancel</a>
                            </form>
                        </div> 
                    </div>
                      <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                          <div class="d-flex align-items-center justify-content-between mb-4">
                            <h4 class="mb-0">taru apae disini</h4>
                            <a href="">kata kata sa kapa</a>
                          </div>
                        <canvas id="salse-revenue"></canvas>
                      </div>
                    </div>
                  </div>
            </div>
        <!-- Recent Sales Start -->

        <!-- Recent Sales End -->

        <!-- Widgets Start -->

        <!-- Widgets End -->

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">urbee</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="#">nubit</a>
                            <br>Distributed By: <a href="#" target="_blank">nubit</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
      </div>
      <!-- Content End -->

      <!-- Back to Top -->
      <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
  </body>
</html>
