<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      // Tangkap event submit form
      $("form").submit(function(event){
        // Hentikan pengiriman form default
        event.preventDefault();

        // Tampilkan pesan atau animasi ke pengguna
        $(".exam-container").fadeOut(500, function(){
          // Callback setelah animasi fadeOut selesai
          // Di sini Anda bisa menambahkan pesan sukses atau animasi lainnya
          // Contoh:
          $(".exam-container").html("<h2>Terima kasih! Jawaban Anda telah terkirim.</h2>").fadeIn(500);
        });
      });
    });
  </script>
</head>
