<!DOCTYPE html>
<html>

<head>
  <style>
    .add {
      display: flex;
      justify-content: center;
    }

    .middle {
      margin-top: 5%;
    }
  </style>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Stok Barang</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />

  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
  </script>
  <script>
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })

    // $("#aku").click(function(){
    //   alert('hai')
    // })

    function myFunction() {
      confirm("Apakah Anda Yakin?");

    }
  </script>

  <?php
    include "connection.php";

    // define variables and set to empty values
    $namaErr = $hargaErr = $jumlahErr = "";
    $nama = $harga = $jumlah = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $nama = $_POST["nama"];
      $harga = $_POST["harga"];
      $jumlah = $_POST["jumlah"];

      $sql = "INSERT INTO stok_barang (nama, harga, jumlah) VALUE ('$nama', '$harga', '$jumlah')";
      $query = mysqli_query($con, $sql);

    }
  ?>

</head>

<body>

  <div class="container middle">
    <h1 class="text-center">Stok Sepeda</h1>
    <div class="add mt-3 mb-4">
      <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">Tambah Barang</button>
    </div>
    <div class="container">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

          <?php

          $sql = "SELECT * FROM stok_barang";
          $query = mysqli_query($con, $sql);
          $nomor = 0;

          while ($barang = mysqli_fetch_array($query)) {
            $nomor++;
            echo "<tr>";

            echo "<th scope='row'>" . $nomor . "</th>";
            echo "<td>" . $barang['nama'] . "</td>";
            echo "<td>" . $barang['harga'] . "</td>";
            echo "<td>" . $barang['jumlah'] . "</td>";

            echo "<td>";
            echo "<a class='btn btn-success mr-3' href='edit_barang.php?id=" . $barang['id_barang'] . "'>Edit</a>";
            echo "<a class='btn btn-danger' onclick='myFunction()' href='delete_barang.php?id=" . $barang['id_barang'] . "'>Delete</a> ";
            echo "</td>";

            echo "</tr>";
          }
          ?>

        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal Add Barang -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-dark text-white">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Sepeda</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
              <label for="nama">Nama Sepeda</label>
              <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="number" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="form-group">
              <label for="jumlah">Jumlah</label>
              <input type="number" class="form-control" id="jumlah" name="jumlah" required>
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>