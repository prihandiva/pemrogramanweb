<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis kelamin</th>
            <th>Alamat</th>
            <th>No telp</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- PHP script untuk mengambil data anggota dari database -->
        <?php
        include('koneksi.php');
        $no = 1;
        $query = "SELECT * FROM anggota ORDER BY id DESC";
        $sql = $db1->prepare($query);
        $sql->execute();
        $res1 = $sql->get_result();
        if ($res1->num_rows > 0) {
            while ($row = $res1->fetch_assoc()) {
                // Mendapatkan data anggota dari setiap baris hasil query
                $id = $row['id'];
                $nama = $row['nama'];
                $jenis_kelamin = ($row['jenis_kelamin'] == 'L') ? "Laki-laki" : "Perempuan";
                $alamat = $row['alamat'];
                $no_telp = $row['no_telp'];
                ?>
                <!-- Menampilkan data anggota dalam tabel -->
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $jenis_kelamin; ?></td>
                    <td><?php echo $alamat; ?></td>
                    <td><?php echo $no_telp; ?></td>
                    <td>
                        <!-- Tombol untuk mengedit data anggota -->
                        <button id="<?php echo $id; ?>" class="btn btn-success btn-sm edit_data">
                            <i class="fa fa-edit"></i>Edit
                        </button>
                        <!-- Tombol untuk menghapus data anggota -->
                        <button id="<?php echo $id; ?>" class="btn btn-danger btn-sm hapus_data">
                            <i class="fa fa-trash"></i>Hapus
                        </button>
                    </td>
                </tr>
                <?php
            }
        } else {
            // Tampilkan pesan jika tidak ada data anggota yang ditemukan
            ?>
            <tr>
                <td colspan="6">Tidak ada data ditemukan</td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<script type="text/javascript">
    // Inisialisasi DataTable pada tabel dengan ID 'example'
    $(document).ready(function () {
        $('#example').DataTable();
    });

    // Fungsi untuk menghapus pesan error saat data anggota diubah
    function reset() {
        document.getElementById("err_nama").innerHTML = "";
        document.getElementById("err_jenis_kelamin").innerHTML = "";
        document.getElementById("err_alamat").innerHTML = "";
        document.getElementById("err_no_telp").innerHTML = "";
    }

    // Peristiwa klik pada tombol edit data anggota
    $(document).on('click', '.edit_data', function () {
        // Mendapatkan ID anggota yang akan diubah
        var id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: "get_data.php",
            data: { id: id },
            dataType: 'json',
            success: function (response) {
                // Menghapus pesan error sebelumnya
                reset();
                // Menggulir ke bagian atas halaman
                $('html, body').animate({ scrollTop: 0 }, 'slow');
                // Mengisi form edit dengan data anggota yang dipilih
                document.getElementById("id").value = response.id;
                document.getElementById("nama").value = response.nama;
                document.getElementById("alamat").value = response.alamat;
                document.getElementById("no_telp").value = response.no_telp;
                if (response.jenis_kelamin == "L") {
                    document.getElementById("jenkel1").checked = true;
                } else {
                    document.getElementById("jenkel2").checked = true;
                }
            },
            error: function (response) {
                console.log(response.responseText);
            }
        });
    });

    // Peristiwa klik pada tombol hapus data anggota
    $(document).on('click', '.hapus_data', function () {
        var id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: "hapus_data.php",
            data: { id: id },
            success: function () {
                // Memuat ulang tabel setelah data anggota dihapus
                $('.data').load("data.php");
            },
            error: function (response) {
                console.log(response.responseText);
            }
        });
    });
</script>