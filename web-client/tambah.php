<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TUGAS4-WEB-CLIENT</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>
</head>

<body>
    <div class="card col-sm-8">
        <div class="card-body ">
            <h5 class="card-title ">Tambah Data</h5>
        </div>
        <form action="prosestambah.php" method="POST">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="form-group row">
                        <label for="recipient-name" class="col-sm-3 col-form-label">Nama Produk:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="namaproduk">
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group row">
                        <label for="recipient-name" class="col-sm-3 col-form-label">Harga:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="harga">
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group row">
                        <label for="recipient-name" class="col-sm-3 col-form-label">Keterangan:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="keterangan">
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group row">
                        <label for="recipient-name" class="col-sm-3 col-form-label">Kategori:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="id_kategori" id="id_kategori">
                                <option value="1">Fashion</option>
                                <option value="2">Electronics</option>
                                <option value="3">Motors</option>
                                <option value="4">Movies</option>
                                <option value="5">Books</option>
                            </select>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="card-body text-center">
                <input type="submit" class="btn btn-success" name="input"><br>
            </div>
        </form>
    </div>
</body>

</html> 
