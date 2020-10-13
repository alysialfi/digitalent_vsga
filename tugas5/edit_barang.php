<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Barang</title>

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
</head>
<body>

  <?php

    include "connection.php"; // Using database connection file here

    $id = $_GET['id']; // get id through query string
    $qry = mysqli_query($con,"SELECT * FROM stok_barang WHERE id_barang ='$id'"); // select query
    $barang = mysqli_fetch_array($qry); // fetch data

    if(isset($_POST['update'])) // when click on Update button
    {
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];
      
        $edit_barang = mysqli_query($con,"UPDATE stok_barang SET nama='$nama', harga='$harga', jumlah='$jumlah' 
                                    WHERE id_barang = '$id'");
      
        if($edit_barang)
        {
            mysqli_close($con); // Close connection
            header("location:view_barang.php"); // redirects to all records page
            exit;
        }
        else
        {
            echo mysqli_error();
        }    	
    }
  ?>

  <h3 class="text-center mt-5">Edit Barang</h3>
  <div class="container">
    <form method="post">
      <div class="form-group">
        <label for="nama">Nama Barang</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $barang['nama'] ?>">
      </div>
      <div class="form-group">
        <label for="harga">Harga</label>
        <input type="number" class="form-control" name="harga" value="<?php echo $barang['harga'] ?>">
      </div>
      <div class="form-group">
        <label for="jumlah">Jumlah</label>
        <input type="number" class="form-control" name="jumlah" value="<?php echo $barang['jumlah'] ?>">
      </div>
      <button type="submit" name="update" value="submit" class="btn btn-success">Submit</button>
    </form>
  </div>
</body>
</html>