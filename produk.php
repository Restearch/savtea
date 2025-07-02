<?php
require "koneksi.php";

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

if (isset($_GET['keyword'])) {
    $keyword = mysqli_real_escape_string($con, $_GET['keyword']);
    $keyword = strtolower($keyword); // untuk pencarian tidak sensitif huruf besar/kecil

    $queryProduk = mysqli_query($con, 
        "SELECT produk.* FROM produk 
        JOIN kategori ON produk.kategori_id = kategori.id 
        WHERE LOWER(produk.nama) LIKE '%$keyword%' 
        OR LOWER(kategori.nama) LIKE '%$keyword%'"
    );

} else if (isset($_GET['kategori'])) {
    $kategori = mysqli_real_escape_string($con, $_GET['kategori']);
    $queryGetKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$kategori'");
    $kategoriId = mysqli_fetch_array($queryGetKategoriId);
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$kategoriId[id]'");

} else {
    $queryProduk = mysqli_query($con, "SELECT * FROM produk");
}

$countData = mysqli_num_rows($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Teh Herbal | Produk</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php"; ?>

    <div class="container-fluid banner-produk d-flex align-items-center">
        <div class="container">
            <h1 class="text-white text-center">Produk</h1>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 mb-5">
                <h3>Kategori</h3>
                <ul class="list-group">
                        <?php while($kategori = mysqli_fetch_array($queryKategori)){ ?>
                        <a href="produk.php?kategori=<?php echo $kategori['nama']; ?>">  
                            <li class="list-group-item"><?php echo $kategori['nama']; ?></li>
                        </a>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-lg-9">
                    <h3 class="text-center mb-3">Produk</h3>
                    <div class="row">
                        <?php
                            if($countData<1){
                        ?>
                            <h4 class="text-center my-5">Produk yang anda cari tidak tersedia</h4>
                        <?php
                            }
                        ?>
                <div class="container py-5">
                    <div class="row mt-5">
                        <?php while($produk = mysqli_fetch_array($queryProduk)) { ?>
                            <div class="col-sm-6 col-md-4 mb-3">
                                <div class="card h-100">
                                    <div class="image-box">
                                        <img src="image/<?php echo $produk['foto']; ?>" class="card-img-top" alt="...">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $produk['nama']; ?></h4>
                                        <p class="card-text">
                                            <?php echo substr($produk['detail'], 0, 100) . '...'; ?>
                                        </p>
                                        <p class="card-text text-harga">
                                            Rp <?php echo number_format($produk['harga'], 0, ',', '.'); ?>
                                        </p>
                                        <div class="d-flex justify-content-center mt-auto">
                                            <a href="produk-detail.php?nama=<?php echo $produk['nama']; ?>" 
                                            class="btn btn-success btn-detail">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require "footer.php"; ?>

    <script src="bootsrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>