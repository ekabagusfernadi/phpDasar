// // ambil elemen2 yang dibutuhkan

// let keyword = document.getElementById("keyword");
// let tombolCari = document.getElementById("tombolCari");
// let containerTable = document.getElementById("containerTable");

// // tombolCari.addEventListener("click", function () {
// //   alert("Berhasil");
// // });

// // tambahkan event ketika keyword ditulis
// keyword.addEventListener("keyup", function () {
//   //   console.log(keyword.value); // ambil apappun yang diketik oleh user

//   // buat object ajax
//   let xhr = new XMLHttpRequest(); // biasanya namanya xhr/ajax

//   // cek kesiapan ajax
//   xhr.onreadystatechange = function () {
//     if (xhr.readyState == 4 && xhr.status == 200) {
//       //console.log(xhr.responseText);
//       containerTable.innerHTML = xhr.responseText;
//     }
//   };

//   // eksekusi ajax
//   xhr.open("GET", "ajax/mahasiswa.php?keyword=" + keyword.value, true); // false = syncronus,true = asyncronus
//   xhr.send();
// });

// ini pakai jquery
$(document).ready(function () {
  // hilangkan tombol cari
  $("#tombolCari").hide();

  // event ketika keyword ditulis
  $("#keyword").on("keyup", function () {
    // munculkan icon loading
    $(".loader").show();

    // ajax menggunakan load
    // $("#containerTable").load("ajax/mahasiswa.php?keyword=" + $("#keyword").val()); // load hanya bisa untuk method get

    // ajax menggunakan $.get()
    $.get("ajax/mahasiswa.php?keyword=" + $("#keyword").val(), function (data) {
      // ketika data sudah didapat lakukan sesuatu sambil mengirim data hasilnya, parameter (data) menggantikan fungsi xhr.responseText di ajax javascript
      $("#containerTable").html(data);
      $(".loader").hide();
    });
  });
}); // atau bisa jQuery(document) // jQuery carikan dokumen, jika dokumen siap jalankan function berikut  // jQuery tidak akan dijalankan sebelum seluruh data dijalankan terlebih dahulu
