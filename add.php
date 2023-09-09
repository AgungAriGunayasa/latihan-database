<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
    <title>Membuat Data Tamu</title>

    <style>
        body {
        	background-color: #f2f2f2;
        }

        .container {
            max-width: 650px;
            margin: 10px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="add.php" method="POST" name="addData">
            <table align="center">
                <tr>
                    <td colspan="2"><h1>Form Buku Tamu</h1></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="name" placeholder="Masukkan Nama" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="address" placeholder="Masukkan Alamat" class="form-control" required></td>
                </tr>
                <tr>
                    <td>No Telp</td>
                    <td><input type="number" name="phone_number" placeholder="Masukkan No Telp" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Pesan</td>
                    <td><textarea name="message" cols="21" rows="3" placeholder="Masukkan Pesan" class="form-control" required></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit" value="Add" class="btn btn-primary"></td>
                </tr>
            </table>
        </form>
        <a href="index.php" style="text-decoration: none;">Kembali</a>
    </div>
</body>
</html>
<?php
    if(isset($_POST['Submit'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone_number'];
        $message = $_POST['message'];
        
        include_once ('connection.php');

        $result = mysqli_query($connect, "INSERT INTO users (name,address,phone_number,message,visiting_date) 
        VALUES ('$name','$address','$phone','$message',now())");

        echo "<script>Swal.fire({
            title: 'Data berhasil disimpan',
            text: 'Berpindah halaman dalam 3 detik.',
            type: 'success',
            timer: 3000,
            showConfirmButton: false
          }).then(function() {
              window.location.href = 'index.php';
          })</script>";
    }
?>