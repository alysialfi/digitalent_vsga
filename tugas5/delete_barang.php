<?php

  include "connection.php";

  if( isset($_GET['id']) ){

      // ambil id dari query string
      $id = $_GET['id'];

      // buat query hapus
      $sql = "DELETE FROM stok_barang WHERE id_barang = $id";
      $query = mysqli_query($con, $sql);

      // apakah query hapus berhasil?
      if( $query ){
          header('Location: view_barang.php');
      } else {
          die("gagal menghapus...");
      }

  } else {
      die("akses dilarang...");
  }
?>