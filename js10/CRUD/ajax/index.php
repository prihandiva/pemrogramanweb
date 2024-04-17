<?php
include 'auth.php'; // Menggunakan auth.php untuk memastikan pengguna telah login sebelum mengakses halaman ini.
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
    <!-- Menambahkan Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <!-- Menambahkan Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnm0Cqb1lwilj8lyljo/mousej skC4p0pQbqy17RrhNudi9RnKkMHpvbliG9Sr" crossorigin="anonymous">
    <!-- Menambahkan DataTables CSS -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <title>Data anggota</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php" style="color: #fff;">
            CRUD Dengan Ajax
        </a>
    </nav>
    <div class="container">
        <h2 align="center" style="margin: 30px;">Data anggota</h2>
        <!-- Form untuk menambah atau mengedit data anggota -->
        <form method="post" class="form-data" id="form-data">
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label>Nama</label>
                        <!-- Input untuk nama anggota -->
                        <input type="hidden" name="id" id="id">
                        <input type="text" name="nama" id="nama" class="form-control" required="true">
                        <!-- Menampilkan pesan error jika nama kosong -->
                        <p class="text-danger" id="err_nama"></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Jenis kelamin</label><br>
                        <!-- Radio button untuk jenis kelamin -->
                        <input type="radio" name="jenis_kelamin" id="jenkel1" value="L" required="true"> Laki-laki
                        <input type="radio" name="jenis_kelamin" id="jenkel2" value="P"> Perempuan
                    </div>
                    <!-- Menampilkan pesan error jika jenis kelamin tidak dipilih -->
                    <p class="text-danger" id="err_jenis_kelamin"></p>
                </div>
            </div>
            <!-- Input untuk alamat anggota -->
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" required="true"></textarea>
                <!-- Menampilkan pesan error jika alamat kosong -->
                <p class="text-danger" id="err_alamat"></p>
            </div>
            <!-- Input untuk nomor telepon anggota -->
            <div class="form-group">
                <label>No Telepon</label>
                <input type="number" name="no_telp" id="no_telp" class="form-control" required="true">
                <!-- Menampilkan pesan error jika nomor telepon kosong -->
                <p class="text-danger" id="err_no_telp"></p>
            </div>
            <!-- Tombol untuk menyimpan data anggota -->
            <div class="form-group">
                <button type="button" name="simpan" id="simpan" class="btn btn-primary">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </div>
        </form>
        <hr>
        <!-- Div untuk menampilkan data anggota -->
        <div class="data"></div>
    </div>
    <!-- Footer -->
    <div class="text-center">©
        <?php echo date('Y'); ?> Copyright:
        <a href="https://google.com/">Desain dan pemrograman web</a>
    </div>

    <!-- Menambahkan jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Menambahkan DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <!-- Menambahkan Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // Mengatur header Csrf-Token pada setiap request Ajax dengan nilai dari meta tag csrf-token
            $.ajaxSetup({
                headers: {
                    'Csrf-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Memuat data anggota saat halaman dimuat
            $('.data').load("data.php");
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            // Menggunakan Ajax untuk menyimpan atau mengedit data anggota
            $("#simpan").click(function () {
                // Mengambil data form
                var data = $('.form-data').serialize();
                // Mendapatkan nilai input
                var nama = document.getElementById("nama").value;
                var alamat = document.getElementById("alamat").value;
                var no_telp = document.getElementById("no_telp").value;

                // Validasi input
                if (nama == "") {
                    document.getElementById("err_nama").innerHTML = "Nama harus diisi";
                } else {
                    document.getElementById("err_nama").innerHTML = "";
                }

                if (alamat == "") {
                    document.getElementById("err_alamat").innerHTML = "Alamat harus diisi";
                } else {
                    document.getElementById("err_alamat").innerHTML = "";
                }

                if (document.getElementById("jenkel1").checked == false && document.getElementById("jenkel2").checked == false) {
                    document.getElementById("err_jenis_kelamin").innerHTML = "Jenis kelamin harus dipilih";
                } else {
                    document.getElementById("err_jenis_kelamin").innerHTML = "";
                }

                if (no_telp == "") {
                    document.getElementById("err_no_telp").innerHTML = "No telepon harus diisi";
                } else {
                    document.getElementById("err_no_telp").innerHTML = "";
                }

                // Jika semua input telah valid, kirim data melalui Ajax
                if (nama != "" && alamat != "" && (document.getElementById("jenkel1").checked == true || document.getElementById("jenkel2").checked == true) && no_telp != "") {
                    $.ajax({
                        type: 'POST',
                        url: "form_action.php",
                        data: data,
                        success: function () {
                            // Memuat ulang data anggota setelah berhasil menyimpan atau mengedit data
                            $('.data').load("data.php");
                            // Reset form setelah berhasil menyimpan atau mengedit data
                            document.getElementById("id").value = "";
                            document.getElementById("form-data").reset();
                        }, error: function (response) {
                            console.log(response.responseText);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>