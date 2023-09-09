<?php
    include_once ("connection.php");

    $result = mysqli_query($connect, "SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
    <title>Data Tamu</title>

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
        <table align="center" class="table table-bordered table-striped rounded overflow-hidden">
            <tr>
                <td colspan="7"><h1 align="center">Data Buku Tamu</h1></td>
            </tr>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Pesan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            <?php
                $n = 1;
                while($user_data = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?= $n; ?></td>
                <td><?= $user_data['name']; ?></td>
                <td><?= $user_data['address']; ?></td>
                <td><?= $user_data['phone_number']; ?></td>
                <td><?= $user_data['message']; ?></td>
                <td><?= $user_data['visiting_date']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $user_data['id']; ?>" class="btn btn-sm btn-success">Edit</a>
                    <a href="delete.php?id=<?= $user_data['id']; ?>" class="btn btn-sm btn-danger delete-confirm">Delete</a>
                </td>
            </tr>
            <?php
                    $n++;
                }
            ?>
        </table>
        <a href="add.php" class="btn btn-primary">Tambah Data Tamu</a>
    </div>
    <script>
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');

            Swal.fire({
                title: 'Anda yakin menghapusnya?',
                text: "Kamu tidak akan dapat mengembalikannya!",
                icon: 'warning',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                showCancelButton: true,
                confirmButtonText: 'Delete'
                
            }).then((result) => {
                if (result.value) {
                    window.location.href = url;
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    event.preventDefault();
                }
            })
        });
    </script>
</body>
</html>