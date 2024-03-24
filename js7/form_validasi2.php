<!DOCTYPE html>
<html>
<head>
    <title>Form Input dengan Validasi</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>
<body>
    <h1>Form Input dengan Validasi</h1>
    <form id="myForm" method="post" action="proses_validasi.php">
        <!--nama-->
        <label for="nama">Nama :</label>
        <input type="text" id="nama" name="nama">
        <span id="nama-error" style="color: red;"></span><br>

        <!--email-->
        <label for="email">Email :</label>
        <input type="text" id="email" name="email">
        <span id="email-error" style="color: red;"></span><br>

       
        <!-- Tombol submit -->
        <input type="submit" value="Submit">
    </form>

    <!-- Script jQuery untuk validasi form -->
    <script>
        $(document).ready(function(){
            $("#myForm").submit(function(event){
                var nama = $("#nama").val();
                var email = $("#email").val();

                var valid = true;

                // nama
                if (nama === ""){
                    $("#nama-error").text("Nama harus diisi");
                    valid = false;
                } else {
                    $("#nama-error").text("");
                }

                // email
                if (email === ""){
                    $("#email-error").text("Email harus diisi");
                    valid = false;
                } else {
                    $("#email-error").text("");
                }

                // Mencegah pengiriman formulir jika ada kesalahan validasi
                if (!valid){
                    event.preventDefault();
                }
            });
        });
    </script>
</body>
</html>