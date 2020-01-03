 <div class="simple-footer">
     Copyright &copy; KP IT RU III 2019
 </div>
 </div>
 </div>
 </div>
 </section>
 </div>
 <!-- General JS Scripts -->
 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
 <script src="<?= base_url('assets/loginregister/'); ?>assets/js/stisla.js"></script>

 <!-- JS Libraies -->

 <!-- Template JS File -->
 <script src="<?= base_url('assets/loginregister/'); ?>js/scripts.js"></script>
 <script src="<?= base_url('assets/loginregister/'); ?>js/custom.js"></script>

 <script>
     $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
         // Kita sembunyikan dulu untuk loadingnya
         $("#loading").hide();

         $("#fungsi").change(function() { // Ketika user mengganti atau memilih data provinsi
             $("#bagian").hide(); // Sembunyikan dulu combobox kota nya
             $("#loading").show(); // Tampilkan loadingnya

             $.ajax({
                 type: "POST", // Method pengiriman data bisa dengan GET atau POST
                 url: "<?php echo base_url("auth/listBagian"); ?>", // Isi dengan url/path file php yang dituju
                 data: {
                     id_fungsi: $("#fungsi").val()
                 }, // data yang akan dikirim ke file yang dituju
                 dataType: "json",
                 beforeSend: function(e) {
                     if (e && e.overrideMimeType) {
                         e.overrideMimeType("application/json;charset=UTF-8");
                     }
                 },
                 success: function(response) { // Ketika proses pengiriman berhasil
                     $("#loading").hide(); // Sembunyikan loadingnya
                     // set isi dari combobox kota
                     // lalu munculkan kembali combobox kotanya
                     $("#bagian").html(response.list_bagian).show();
                 },
                 error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                     alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                 }
             });
         });
     });
 </script>
 <!-- Page Specific JS File -->
 </body>

 </html>